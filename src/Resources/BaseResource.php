<?php

namespace Faiznurullah\Tiktok\Resources;

use Faiznurullah\Tiktok\Config\ConfigInterface;
use Faiznurullah\Tiktok\Http\HttpClientInterface;


abstract class BaseResource
{
    protected HttpClientInterface $httpClient;
    protected ConfigInterface $config;

    public function __construct(HttpClientInterface $httpClient, ConfigInterface $config)
    {
        $this->httpClient = $httpClient;
        $this->config = $config;
    }

    
    protected function buildEndpoint(string $endpoint): string
    {
        return "/{$endpoint}";
    }

   
    protected function get(string $endpoint, array $params = []): array
    {
        return $this->httpClient->get($this->buildEndpoint($endpoint), $params);
    }

    protected function post(string $endpoint, array $data = [], array $params = []): array
    {
        return $this->httpClient->post($this->buildEndpoint($endpoint), $data, $params);
    }

    protected function put(string $endpoint, array $data = [], array $params = []): array
    {
        return $this->httpClient->put($this->buildEndpoint($endpoint), $data, $params);
    }

   
    protected function delete(string $endpoint, array $params = []): array
    {
        return $this->httpClient->delete($this->buildEndpoint($endpoint), $params);
    }

   
    protected function deleteWithBody(string $endpoint, array $data = [], array $params = []): array
    {
        return $this->httpClient->request('DELETE', $this->buildEndpoint($endpoint), [
            'json' => $data,
            'query' => $params
        ]);
    }
}