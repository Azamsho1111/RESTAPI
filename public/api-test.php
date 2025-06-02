<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    exit(0);
}

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($uri === '/api-test.php') {
    echo json_encode([
        'status' => 'success',
        'message' => 'Laravel API тест работает!',
        'timestamp' => date('c'),
        'server' => 'Railway + Laravel 12'
    ]);
    exit;
}

// Dashboard stats
if ($uri === '/api-test.php/dashboard/stats') {
    echo json_encode([
        'status' => 'success',
        'data' => [
            'users' => 150,
            'models' => 89,
            'downloads' => 1234,
            'revenue' => 5670,
            'pendingReviews' => 12,
            'activeModels' => 67
        ]
    ]);
    exit;
}

echo json_encode([
    'status' => 'error',
    'message' => 'Endpoint not found',
    'uri' => $uri
]);
