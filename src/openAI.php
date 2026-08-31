<?php

namespace Euticus\WhatsappAi;

class OpenAI
{
    private string $apiKey;

    public function __construct()
    {
        $this->apiKey = $_ENV['OPENAI_API_KEY'] ?? '';
    }

    public function hasApiKey(): bool
    {
        return $this->apiKey !== '';
    }
}
