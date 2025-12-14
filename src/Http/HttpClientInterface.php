<?php

namespace Faiznurullah\Tiktok\Http;


interface HttpClientInterface
{
  
    public function get(string $endpoint, array $params = []): array;

    
    public function post(string $endpoint, array $data = [], array $params = []): array;

    public function put(string $endpoint, array $data = [], array $params = []): array;

    
    public function delete(string $endpoint, array $params = []): array;

    public function request(string $method, string $endpoint, array $options = []): array;
}