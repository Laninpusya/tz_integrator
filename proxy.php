<?php
// Прокси-скрипт для обхода ограничений CORS
$apiUrl = 'https://crm.belmar.pro/api/v1/getstatuses';
$token = 'ba67df6a-a17c-476f-8e95-bcdb75ed3958';

// Получаем данные от фронта
$requestData = json_decode(file_get_contents('php://input'), true);

// Запрос к API
$options = [
    'http' => [
        'method' => 'POST',
        'header' => "Content-Type: application/json\r\n" .
            "token: $token\r\n",
        'content' => json_encode($requestData),
    ],
];

$context = stream_context_create($options);
$response = file_get_contents($apiUrl, false, $context);

// Отправляем JSON на фронт
header('Content-Type: application/json');
echo $response;

