<?php

namespace Euticus\WhatsappAi;

use OpenAI\Client as OpenAIClient;
use \OpenAI as OpenAISDK;

class OpenAI
{
    private string $apiKey;
    private ?OpenAIClient $client = null;

    public function __construct()
    {
        $this->apiKey = $_ENV['OPENAI_API_KEY'] ?? '';

        if ($this->apiKey !== '') {
            $this->client = OpenAISDK::client($this->apiKey);
        }
    }

    public function hasApiKey(): bool
    {
        return $this->apiKey !== '';
    }

    public function getClient(): ?OpenAIClient
    {
        return $this->client;
    }
}
