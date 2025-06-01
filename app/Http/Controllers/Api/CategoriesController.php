<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class CategoriesController extends Controller
{
    /**
     * Список категорий
     * GET /api/categories
     */
    public function index(): JsonResponse
    {
        try {
            $categories = [
                [
                    'id' => 1,
                    'name' => 'Архитектура',
                    'name_en' => 'Architecture',
                    'icon' => 'building',
                    'position' => 1,
                    'models_count' => 25,
                    'sections_count' => 5
                ],
                [
                    'id' => 2,
                    'name' => 'Мебель',
                    'name_en' => 'Furniture',
                    'icon' => 'chair',
                    'position' => 2,
                    'models_count' => 150,
                    'sections_count' => 12
                ],
                [
                    'id' => 3,
                    'name' => 'Транспорт',
                    'name_en' => 'Transport',
                    'icon' => 'car',
                    'position' => 3,
                    'models_count' => 75,
                    'sections_count' => 8
                ],
                [
                    'id' => 4,
                    'name' => 'Декор',
                    'name_en' => 'Decor',
                    'icon' => 'decoration',
                    'position' => 4,
                    'models_count' => 90,
                    'sections_count' => 15
                ],
                [
                    'id' => 5,
                    'name' => 'Освещение',
                    'name_en' => 'Lighting',
                    'icon' => 'lightbulb',
                    'position' => 5,
                    'models_count' => 45,
                    'sections_count' => 6
                ]
            ];

            return response()->json([
                'success' => true,
                'data' => $categories
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Ошибка загрузки категорий',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Создание категории
     * POST /api/categories
     */
    public function store(Request $request): JsonResponse
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'name_en' => 'required|string|max:255',
                'icon' => 'nullable|string',
                'position' => 'nullable|integer'
            ]);

            $category = [
                'id' => rand(1000, 9999),
                'name' => $request->name,
                'name_en' => $request->name_en,
                'icon' => $request->icon,
                'position' => $request->position ?? 999,
                'models_count' => 0,
                'created_at' => now()
            ];

            return response()->json([
                'success' => true,
                'data' => $category,
                'message' => 'Категория успешно создана'
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Ошибка создания категории',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Получение категории по ID
     * GET /api/categories/{id}
     */
    public function show($id): JsonResponse
    {
        try {
            $category = [
                'id' => $id,
                'name' => 'Мебель',
                'name_en' => 'Furniture',
                'icon' => 'chair',
                'position' => 2,
                'models_count' => 150,
                'sections' => [
                    ['id' => 1, 'name' => 'Столы', 'name_en' => 'Tables'],
                    ['id' => 2, 'name' => 'Стулья', 'name_en' => 'Chairs'],
                    ['id' => 3, 'name' => 'Диваны', 'name_en' => 'Sofas']
                ]
            ];

            return response()->json([
                'success' => true,
                'data' => $category
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Категория не найдена',
                'error' => $e->getMessage()
            ], 404);
        }
    }

    /**
     * Обновление категории
     * PUT /api/categories/{id}
     */
    public function update(Request $request, $id): JsonResponse
    {
        try {
            $request->validate([
                'name' => 'sometimes|required|string|max:255',
                'name_en' => 'sometimes|required|string|max:255',
                'icon' => 'nullable|string',
                'position' => 'nullable|integer'
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Категория успешно обновлена'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Ошибка обновления категории',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Удаление категории
     * DELETE /api/categories/{id}
     */
    public function destroy($id): JsonResponse
    {
        try {
            return response()->json([
                'success' => true,
                'message' => 'Категория успешно удалена'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Ошибка удаления категории',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Разделы в категории
     * GET /api/categories/{id}/sections
     */
    public function sections($id): JsonResponse
    {
        try {
            $sections = [
                ['id' => 1, 'name' => 'Столы', 'name_en' => 'Tables', 'position' => 1],
                ['id' => 2, 'name' => 'Стулья', 'name_en' => 'Chairs', 'position' => 2],
                ['id' => 3, 'name' => 'Диваны', 'name_en' => 'Sofas', 'position' => 3],
                ['id' => 4, 'name' => 'Шкафы', 'name_en' => 'Wardrobes', 'position' => 4]
            ];

            return response()->json([
                'success' => true,
                'data' => $sections
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Ошибка загрузки разделов',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}