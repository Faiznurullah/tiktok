<?php

namespace Faiznurullah\Tiktok\Http;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Faiznurullah\Tiktok\Config\ConfigInterface;
use Faiznurullah\Tiktok\Exceptions\TikTokShopException;
use Faiznurullah\Tiktok\Support\SignatureGenerator;




class GuzzleHttpClient implements HttpClientInterface
{
    private Client $client;
    private ConfigInterface $config;
    private SignatureGenerator $signatureGenerator;

    public function __construct(ConfigInterface $config)
    {
        $this->config = $config;
        $this->signatureGenerator = new SignatureGenerator($config);
        
        $this->client = new Client([
            'base_uri' => $config->getBaseUrl(),
            'timeout' => $config->getTimeout(),
            'verify' => !$config->isDebugMode(),
        ]);
    }

    public function get(string $endpoint, array $params = []): array
    {
        return $this->request('GET', $endpoint, ['query' => $params]);
    }

    public function post(string $endpoint, array $data = [], array $params = []): array
    {
        return $this->request('POST', $endpoint, [
            'query' => $params,
            'json' => $data
        ]);
    }

    public function put(string $endpoint, array $data = [], array $params = []): array
    {
        return $this->request('PUT', $endpoint, [
            'query' => $params,
            'json' => $data
        ]);
    }

    public function delete(string $endpoint, array $params = []): array
    {
        return $this->request('DELETE', $endpoint, ['query' => $params]);
    }

    public function request(string $method, string $endpoint, array $options = []): array
    {
        try {
            
            $options['headers'] = array_merge([
                'Content-Type' => 'application/json',
                'x-tts-access-token' => $this->config->getAccessToken() ?? '',
            ], $options['headers'] ?? []);

           
            $query = $options['query'] ?? [];
            $query = $this->addAuthParams($query, $endpoint, $method);
            $options['query'] = $query;

            $response = $this->client->request($method, $endpoint, $options);
            $body = $response->getBody()->getContents();
            
            $data = json_decode($body, true);
            
            if (json_last_error() !== JSON_ERROR_NONE) {
                throw new TikTokShopException('Invalid JSON response: ' . json_last_error_msg());
            }
            
            if (isset($data['code']) && $data['code'] !== 0) {
                throw new TikTokShopException(
                    $data['message'] ?? 'API request failed',
                    $data['code']
                );
            }

            return $data;

        } catch (RequestException $e) {
            $message = 'HTTP request failed: ' . $e->getMessage();
            
            if ($e->hasResponse()) {
                $body = $e->getResponse()->getBody()->getContents();
                $errorData = json_decode($body, true);
                
                if (is_array($errorData) && isset($errorData['message'])) {
                    $message .= ' - ' . $errorData['message'];
                }
            }
            
            throw new TikTokShopException($message, $e->getCode(), $e);
        }
    }

  
    private function addAuthParams(array $params, string $endpoint, string $method): array
    {
        $params['app_key'] = $this->config->getAppKey();
        $params['timestamp'] = time();
        $params['sign'] = $this->signatureGenerator->generate($params, $endpoint, $method);

        return $params;
    }
}