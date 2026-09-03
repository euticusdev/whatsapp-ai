<?php

// Load .env file
$env = parse_ini_file(__DIR__ . '/../.env');

$token = $env['WHATSAPP_ACCESS_TOKEN'];
$phoneNumberId = $env['WHATSAPP_PHONE_NUMBER_ID'];
$to = "254720470681";   // ← put your real WhatsApp number here (with country code, no +)

$data = [
    "messaging_product" => "whatsapp",
    "to" => $to,
    "type" => "text",
    "text" => [
        "body" => "Hello from my PHP bot"
    ]
];

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://graph.facebook.com/v21.0/$phoneNumberId/messages");
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: Bearer $token",
    "Content-Type: application/json"
]);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

$response = curl_exec($ch);
curl_close($ch);

echo $response;
