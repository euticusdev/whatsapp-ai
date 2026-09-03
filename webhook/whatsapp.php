<?php

$verify_token = "myverifytoken";

// Handle webhook verification (GET request from Meta)
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $mode = $_GET['hub_mode'] ?? '';
    $token = $_GET['hub_verify_token'] ?? '';
    $challenge = $_GET['hub_challenge'] ?? '';

    if ($mode === 'subscribe' && $token === $verify_token) {
        echo $challenge;
        exit;
    } else {
        http_response_code(403);
        echo "Forbidden";
        exit;
    }
}

// Handle incoming messages (POST request)
$input = file_get_contents("php://input");
file_put_contents(__DIR__ . "/../logs/incoming.txt", date("Y-m-d H:i:s") . "\n" . $input . "\n\n", FILE_APPEND);

http_response_code(200);
echo "OK";
