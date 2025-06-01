<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\ModelsController;
use App\Http\Controllers\Api\UsersController;
use App\Http\Controllers\Api\CategoriesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Auth routes (public)
Route::prefix('auth')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::get('/user', [AuthController::class, 'user']);
    });
});

// Protected routes
Route::middleware('auth:sanctum')->group(function () {
    
    // Dashboard routes
    Route::get('/dashboard/stats', [DashboardController::class, 'getStats']);
    
    // Models routes
    Route::apiResource('models', ModelsController::class);
    Route::patch('/models/{id}/status', [ModelsController::class, 'updateStatus']);
    Route::post('/models/{id}/moderate', [ModelsController::class, 'moderate']);
    
    // Users routes  
    Route::apiResource('users', UsersController::class);
    Route::patch('/users/{id}/block', [UsersController::class, 'block']);
    Route::patch('/users/{id}/unblock', [UsersController::class, 'unblock']);
    
    // Categories and filters routes
    Route::get('/categories', [CategoriesController::class, 'getCategories']);
    Route::post('/categories', [CategoriesController::class, 'createCategory']);
    Route::put('/categories/{id}', [CategoriesController::class, 'updateCategory']);
    Route::delete('/categories/{id}', [CategoriesController::class, 'deleteCategory']);
    
    Route::get('/sections', [CategoriesController::class, 'getSections']);
    Route::post('/sections', [CategoriesController::class, 'createSection']);
    Route::put('/sections/{id}', [CategoriesController::class, 'updateSection']);
    Route::delete('/sections/{id}', [CategoriesController::class, 'deleteSection']);
    
    Route::get('/materials', [CategoriesController::class, 'getMaterials']);
    Route::post('/materials', [CategoriesController::class, 'createMaterial']);
    Route::put('/materials/{id}', [CategoriesController::class, 'updateMaterial']);
    Route::delete('/materials/{id}', [CategoriesController::class, 'deleteMaterial']);
    
    Route::get('/renders', [CategoriesController::class, 'getRenders']);
    Route::post('/renders', [CategoriesController::class, 'createRender']);
    Route::put('/renders/{id}', [CategoriesController::class, 'updateRender']);
    Route::delete('/renders/{id}', [CategoriesController::class, 'deleteRender']);
    
    Route::get('/colors', [CategoriesController::class, 'getColors']);
    Route::post('/colors', [CategoriesController::class, 'createColor']);
    Route::put('/colors/{id}', [CategoriesController::class, 'updateColor']);
    Route::delete('/colors/{id}', [CategoriesController::class, 'deleteColor']);
    
    Route::get('/softs', [CategoriesController::class, 'getSofts']);
    Route::post('/softs', [CategoriesController::class, 'createSoft']);
    Route::put('/softs/{id}', [CategoriesController::class, 'updateSoft']);
    Route::delete('/softs/{id}', [CategoriesController::class, 'deleteSoft']);
    
    Route::get('/formats', [CategoriesController::class, 'getFormats']);
    Route::post('/formats', [CategoriesController::class, 'createFormat']);
    Route::put('/formats/{id}', [CategoriesController::class, 'updateFormat']);
    Route::delete('/formats/{id}', [CategoriesController::class, 'deleteFormat']);
    
    Route::get('/polygons', [CategoriesController::class, 'getPolygons']);
    Route::post('/polygons', [CategoriesController::class, 'createPolygon']);
    Route::put('/polygons/{id}', [CategoriesController::class, 'updatePolygon']);
    Route::delete('/polygons/{id}', [CategoriesController::class, 'deletePolygon']);
    
    Route::get('/styles', [CategoriesController::class, 'getStyles']);
    Route::post('/styles', [CategoriesController::class, 'createStyle']);
    Route::put('/styles/{id}', [CategoriesController::class, 'updateStyle']);
    Route::delete('/styles/{id}', [CategoriesController::class, 'deleteStyle']);
    
    Route::get('/animation', [CategoriesController::class, 'getAnimation']);
    Route::post('/animation', [CategoriesController::class, 'createAnimation']);
    Route::put('/animation/{id}', [CategoriesController::class, 'updateAnimation']);
    Route::delete('/animation/{id}', [CategoriesController::class, 'deleteAnimation']);
    
    Route::get('/others', [CategoriesController::class, 'getOthers']);
    Route::post('/others', [CategoriesController::class, 'createOther']);
    Route::put('/others/{id}', [CategoriesController::class, 'updateOther']);
    Route::delete('/others/{id}', [CategoriesController::class, 'deleteOther']);
});