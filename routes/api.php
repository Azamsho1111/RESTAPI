<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\UsersController;
use App\Http\Controllers\Api\CategoriesController;
use App\Http\Controllers\Api\ModelsController;

// Публичные маршруты
Route::post('/auth/login', [AuthController::class, 'login']);
Route::post('/auth/register', [AuthController::class, 'register']);

// Публичные данные для админ-панели (БЕЗ авторизации)
Route::get('/dashboard/stats', [DashboardController::class, 'getStats']);
Route::get('/categories', [CategoriesController::class, 'getCategories']);

// Защищенные маршруты
Route::middleware('auth:sanctum')->group(function () {
    // Авторизация
    Route::post('/auth/logout', [AuthController::class, 'logout']);
    Route::get('/auth/user', [AuthController::class, 'user']);

    // Дашборд (защищенные endpoint'ы)
    Route::get('/dashboard/recent-models', [DashboardController::class, 'getRecentModels']);
    Route::get('/dashboard/recent-users', [DashboardController::class, 'getRecentUsers']);

    // Пользователи
    Route::get('/users', [UsersController::class, 'index']);
    Route::post('/users', [UsersController::class, 'store']);
    Route::get('/users/{id}', [UsersController::class, 'show']);
    Route::put('/users/{id}', [UsersController::class, 'update']);
    Route::delete('/users/{id}', [UsersController::class, 'destroy']);

    // Модели
    Route::get('/models', [ModelsController::class, 'index']);
    Route::post('/models', [ModelsController::class, 'store']);
    Route::get('/models/{id}', [ModelsController::class, 'show']);
    Route::put('/models/{id}', [ModelsController::class, 'update']);
    Route::delete('/models/{id}', [ModelsController::class, 'destroy']);

    // Категории и фильтры (защищенные операции)
    Route::prefix('categories')->group(function () {
        Route::post('/', [CategoriesController::class, 'createCategory']);
        Route::put('/{id}', [CategoriesController::class, 'updateCategory']);
        Route::delete('/{id}', [CategoriesController::class, 'deleteCategory']);
    });

    Route::prefix('sections')->group(function () {
        Route::get('/', [CategoriesController::class, 'getSections']);
        Route::post('/', [CategoriesController::class, 'createSection']);
        Route::put('/{id}', [CategoriesController::class, 'updateSection']);
        Route::delete('/{id}', [CategoriesController::class, 'deleteSection']);
    });

    Route::prefix('materials')->group(function () {
        Route::get('/', [CategoriesController::class, 'getMaterials']);
        Route::post('/', [CategoriesController::class, 'createMaterial']);
        Route::put('/{id}', [CategoriesController::class, 'updateMaterial']);
        Route::delete('/{id}', [CategoriesController::class, 'deleteMaterial']);
    });

    Route::prefix('renders')->group(function () {
        Route::get('/', [CategoriesController::class, 'getRenders']);
        Route::post('/', [CategoriesController::class, 'createRender']);
        Route::put('/{id}', [CategoriesController::class, 'updateRender']);
        Route::delete('/{id}', [CategoriesController::class, 'deleteRender']);
    });

    Route::prefix('colors')->group(function () {
        Route::get('/', [CategoriesController::class, 'getColors']);
        Route::post('/', [CategoriesController::class, 'createColor']);
        Route::put('/{id}', [CategoriesController::class, 'updateColor']);
        Route::delete('/{id}', [CategoriesController::class, 'deleteColor']);
    });

    Route::prefix('softs')->group(function () {
        Route::get('/', [CategoriesController::class, 'getSofts']);
        Route::post('/', [CategoriesController::class, 'createSoft']);
        Route::put('/{id}', [CategoriesController::class, 'updateSoft']);
        Route::delete('/{id}', [CategoriesController::class, 'deleteSoft']);
    });

    Route::prefix('formats')->group(function () {
        Route::get('/', [CategoriesController::class, 'getFormats']);
        Route::post('/', [CategoriesController::class, 'createFormat']);
        Route::put('/{id}', [CategoriesController::class, 'updateFormat']);
        Route::delete('/{id}', [CategoriesController::class, 'deleteFormat']);
    });

    Route::prefix('polygons')->group(function () {
        Route::get('/', [CategoriesController::class, 'getPolygons']);
        Route::post('/', [CategoriesController::class, 'createPolygon']);
        Route::put('/{id}', [CategoriesController::class, 'updatePolygon']);
        Route::delete('/{id}', [CategoriesController::class, 'deletePolygon']);
    });

    Route::prefix('styles')->group(function () {
        Route::get('/', [CategoriesController::class, 'getStyles']);
        Route::post('/', [CategoriesController::class, 'createStyle']);
        Route::put('/{id}', [CategoriesController::class, 'updateStyle']);
        Route::delete('/{id}', [CategoriesController::class, 'deleteStyle']);
    });

    Route::prefix('animation')->group(function () {
        Route::get('/', [CategoriesController::class, 'getAnimation']);
        Route::post('/', [CategoriesController::class, 'createAnimation']);
        Route::put('/{id}', [CategoriesController::class, 'updateAnimation']);
        Route::delete('/{id}', [CategoriesController::class, 'deleteAnimation']);
    });

    Route::prefix('others')->group(function () {
        Route::get('/', [CategoriesController::class, 'getOthers']);
        Route::post('/', [CategoriesController::class, 'createOther']);
        Route::put('/{id}', [CategoriesController::class, 'updateOther']);
        Route::delete('/{id}', [CategoriesController::class, 'deleteOther']);
    });
});