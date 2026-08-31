<?php

namespace Euticus\WhatsappAi;

use GuzzleHttp\Client;

class WhatsApp
{
    private Client $http;
    private string $accessToken;
    private string $phoneNumberId;

    public function __construct()
    {
        $this->http = new Client();

        $this->accessToken = $_ENV['WHATSAPP_ACCESS_TOKEN'] ?? '';
        $this->phoneNumberId = $_ENV['WHATSAPP_PHONE_NUMBER_ID'] ?? '';
    }

    public function isConfigured(): bool
    {
        return $this->accessToken !== ''
            && $this->phoneNumberId !== '';
    }
}
