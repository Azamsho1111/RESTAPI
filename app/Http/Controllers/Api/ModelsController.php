<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ModelsController extends Controller
{
    /**
     * Список моделей с фильтрацией
     * GET /api/models
     */
    public function index(Request $request): JsonResponse
    {
        try {
            // Тестовые данные для проверки подключения
            $models = [
                [
                    'id' => 1,
                    'title' => 'Современный стул',
                    'description' => 'Стильный офисный стул',
                    'status' => 'Free',
                    'category' => 'Мебель',
                    'author' => 'Дизайнер 1',
                    'created_at' => '2024-01-15'
                ],
                [
                    'id' => 2,
                    'title' => 'Игровая модель автомобиля',
                    'description' => 'Детализированная модель спорткара',
                    'status' => 'Pro',
                    'category' => 'Транспорт',
                    'author' => 'Дизайнер 2',
                    'created_at' => '2024-01-14'
                ],
                [
                    'id' => 3,
                    'title' => 'Архитектурное здание',
                    'description' => 'Современное офисное здание',
                    'status' => 'Sell',
                    'category' => 'Архитектура',
                    'author' => 'Дизайнер 3',
                    'created_at' => '2024-01-13'
                ]
            ];

            return response()->json([
                'success' => true,
                'data' => $models,
                'total' => count($models)
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Ошибка загрузки моделей',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Загрузка новой модели
     * POST /api/models
     */
    public function store(Request $request): JsonResponse
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'category_id' => 'required|integer',
                'status' => 'required|in:Free,Pro,Sell'
            ]);

            // Здесь будет логика сохранения в базу данных
            $model = [
                'id' => rand(1000, 9999),
                'title' => $request->title,
                'description' => $request->description,
                'status' => $request->status,
                'created_at' => now()
            ];

            return response()->json([
                'success' => true,
                'data' => $model,
                'message' => 'Модель успешно создана'
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Ошибка создания модели',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Получение модели по ID
     * GET /api/models/{id}
     */
    public function show($id): JsonResponse
    {
        try {
            // Тестовые данные
            $model = [
                'id' => $id,
                'title' => 'Тестовая модель',
                'description' => 'Описание модели',
                'status' => 'Free',
                'category' => 'Мебель',
                'author' => 'Тестовый автор'
            ];

            return response()->json([
                'success' => true,
                'data' => $model
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Модель не найдена',
                'error' => $e->getMessage()
            ], 404);
        }
    }

    /**
     * Редактирование модели
     * PUT /api/models/{id}
     */
    public function update(Request $request, $id): JsonResponse
    {
        try {
            $request->validate([
                'title' => 'sometimes|required|string|max:255',
                'description' => 'sometimes|required|string',
                'status' => 'sometimes|required|in:Free,Pro,Sell'
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Модель успешно обновлена'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Ошибка обновления модели',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Удаление модели
     * DELETE /api/models/{id}
     */
    public function destroy($id): JsonResponse
    {
        try {
            return response()->json([
                'success' => true,
                'message' => 'Модель успешно удалена'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Ошибка удаления модели',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Модерация модели
     * PATCH /api/models/{id}/moderate
     */
    public function moderate(Request $request, $id): JsonResponse
    {
        try {
            $request->validate([
                'action' => 'required|in:approve,reject,ignore',
                'comment' => 'nullable|string'
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Статус модерации обновлен',
                'data' => [
                    'model_id' => $id,
                    'action' => $request->action,
                    'comment' => $request->comment
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Ошибка модерации',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}