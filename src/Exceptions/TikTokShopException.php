<?php

namespace Faiznurullah\Tiktok\Exceptions;

use Exception;


class TikTokShopException extends Exception
{
    private ?array $context;

    public function __construct(string $message = '', int $code = 0, ?Exception $previous = null, ?array $context = null)
    {
        parent::__construct($message, $code, $previous);
        $this->context = $context;
    }

    
    public function getContext(): ?array
    {
        return $this->context;
    }
}