<?php

namespace Faiznurullah\Tiktok\Support;

use Faiznurullah\Tiktok\Config\ConfigInterface;

// by documentation
class SignatureGenerator
{
    private ConfigInterface $config;

    public function __construct(ConfigInterface $config)
    {
        $this->config = $config;
    }

    /**
     * Generate signature for API request
     * 
     * @param array $params Query parameters
     * @param string $endpoint API endpoint path
     * @param string $method HTTP method
     * @return string Generated signature
     */
    public function generate(array $params, string $endpoint, string $method = 'GET'): string
    {
       
        unset($params['sign']);
        ksort($params);

        
        $queryString = '';
        foreach ($params as $key => $value) {
            if (is_array($value)) {
                $value = implode(',', $value);
            }
            $queryString .= $key . $value;
        }

       
        $stringToSign = $this->config->getAppSecret() . $endpoint . $queryString . $this->config->getAppSecret();
        return hash_hmac('sha256', $stringToSign, $this->config->getAppSecret());
    }
}