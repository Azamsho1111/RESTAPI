<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Простой тестовый маршрут для проверки API
Route::get('/test', function () {
    return response()->json([
        'status' => 'success',
        'message' => 'Laravel API работает!',
        'timestamp' => now()->toISOString()
    ]);
});

// Маршрут для дашборда БЕЗ авторизации
Route::get('/dashboard/stats', function () {
    return response()->json([
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
});

// Пользователи БЕЗ авторизации для тестирования
Route::get('/users', function () {
    return response()->json([
        'status' => 'success',
        'data' => [
            [
                'id' => 1,
                'name' => 'Администратор',
                'email' => 'admin@example.com',
                'role' => 'admin',
                'status' => 'active',
                'created_at' => '2024-01-01T00:00:00Z'
            ]
        ],
        'total' => 150,
        'current_page' => 1,
        'per_page' => 10
    ]);
});

// Модели БЕЗ авторизации для тестирования
Route::get('/models', function () {
    return response()->json([
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
            ]
        ],
        'total' => 89,
        'current_page' => 1,
        'per_page' => 10
    ]);
});

// Все остальные маршруты с контроллерами оставляем как есть
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\UsersController;
use App\Http\Controllers\Api\CategoriesController;
use App\Http\Controllers\Api\ModelsController;

// Публичные маршруты
Route::post('/auth/login', [AuthController::class, 'login']);
Route::post('/auth/register', [AuthController::class, 'register']);

// Публичные данные для админ-панели (БЕЗ авторизации)
Route::get('/categories', [CategoriesController::class, 'getCategories']);

// Защищенные маршруты
Route::middleware('auth:sanctum')->group(function () {
    // Авторизация
    Route::post('/auth/logout', [AuthController::class, 'logout']);
    Route::get('/auth/user', [AuthController::class, 'user']);

    // Дашборд (защищенные endpoint'ы)
    Route::get('/dashboard/recent-models', [DashboardController::class, 'getRecentModels']);
    Route::get('/dashboard/recent-users', [DashboardController::class, 'getRecentUsers']);
});
