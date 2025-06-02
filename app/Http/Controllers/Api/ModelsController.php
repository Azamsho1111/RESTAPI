<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ModelsController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        // Пока возвращаем пустой массив, так как таблица моделей еще не создана
        return response()->json([
            'success' => true,
            'data' => [
                'data' => [],
                'total' => 0,
                'per_page' => 15,
                'current_page' => 1,
            ],
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|integer',
            'price' => 'required|numeric|min:0',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Модель будет создана после настройки базы данных',
        ], 201);
    }

    public function show($id): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => [
                'id' => $id,
                'name' => 'Тестовая модель',
                'status' => 'pending',
            ],
        ]);
    }

    public function update(Request $request, $id): JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => 'Модель обновлена',
        ]);
    }

    public function destroy($id): JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => 'Модель удалена',
        ]);
    }

    public function updateStatus(Request $request, $id): JsonResponse
    {
        $request->validate([
            'status' => 'required|string|in:pending,approved,rejected',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Статус модели обновлен',
        ]);
    }

    public function moderate(Request $request, $id): JsonResponse
    {
        $request->validate([
            'action' => 'required|string|in:approve,reject',
            'comment' => 'nullable|string',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Модерация выполнена',
        ]);
    }
}