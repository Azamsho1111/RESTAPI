<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Прямые API маршруты для тестирования
if (strpos($_SERVER['REQUEST_URI'], '/api/') === 0) {
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
    header('Access-Control-Allow-Headers: Content-Type, Authorization');
    
    if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
        exit(0);
    }
    
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    
    switch ($uri) {
        case '/api/test':
            echo json_encode([
                'status' => 'success',
                'message' => 'Laravel API работает!',
                'timestamp' => date('c'),
                'server' => 'Railway + Laravel'
            ]);
            exit;
            
        case '/api/dashboard/stats':
            echo json_encode([
                'status' => 'success',
                'data' => [
                    'users' => 150,
                    'models' => 89,
                    'downloads' => 1234,
                    'revenue' => 5670,
                    'pendingReviews' => 12,
                    'activeModels' => 67,
                    'newUsersToday' => 8,
                    'modelsApprovedToday' => 5
                ]
            ]);
            exit;
            
        case '/api/users':
            echo json_encode([
                'status' => 'success',
                'data' => [
                    [
                        'id' => 1,
                        'name' => 'Администратор',
                        'email' => 'admin@example.com',
                        'role' => 'admin',
                        'status' => 'active',
                        'created_at' => '2024-01-01T00:00:00Z'
                    ],
                    [
                        'id' => 2,
                        'name' => 'Модератор',
                        'email' => 'moderator@example.com',
                        'role' => 'moderator', 
                        'status' => 'active',
                        'created_at' => '2024-01-15T00:00:00Z'
                    ]
                ],
                'total' => 150,
                'current_page' => 1,
                'per_page' => 10
            ]);
            exit;
            
        case '/api/models':
            echo json_encode([
                'status' => 'success',
                'data' => [
                    [
                        'id' => 1,
                        'name' => '3D Модель Дома',
                        'category' => 'Архитектура',
                        'status' => 'approved',
                        'downloads' => 45,
                        'author' => 'Designer1',
                        'created_at' => '2024-01-10T00:00:00Z'
                    ],
                    [
                        'id' => 2,
                        'name' => 'Интерьер Гостиной',
                        'category' => 'Интерьер',
                        'status' => 'pending',
                        'downloads' => 23,
                        'author' => 'Designer2',
                        'created_at' => '2024-01-20T00:00:00Z'
                    ]
                ],
                'total' => 89,
                'current_page' => 1,
                'per_page' => 10
            ]);
            exit;
            
        default:
            echo json_encode([
                'status' => 'error',
                'message' => 'API endpoint не найден',
                'uri' => $uri
            ]);
            exit;
    }
}

// Обычный Laravel bootstrap для веб маршрутов
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

require __DIR__.'/../vendor/autoload.php';

/** @var Application $app */
$app = require_once __DIR__.'/../bootstrap/app.php';

$app->handleRequest(Request::capture());
