<?php

namespace Euticus\WhatsappAi;

use Dotenv\Dotenv;

class Config
{
    public static function load(): void
    {
        $dotenv = Dotenv::createImmutable(dirname(__DIR__));
        $dotenv->load();
    }

    public static function get(string $key): ?string
    {
        return $_ENV[$key] ?? null;
    }
}
