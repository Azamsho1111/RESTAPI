<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class CategoriesController extends Controller
{
    // Категории
    public function getCategories(): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => [],
        ]);
    }

    public function createCategory(Request $request): JsonResponse
    {
        $request->validate(['name' => 'required|string|max:255']);
        return response()->json(['success' => true, 'message' => 'Категория создана'], 201);
    }

    public function updateCategory(Request $request, $id): JsonResponse
    {
        $request->validate(['name' => 'required|string|max:255']);
        return response()->json(['success' => true, 'message' => 'Категория обновлена']);
    }

    public function deleteCategory($id): JsonResponse
    {
        return response()->json(['success' => true, 'message' => 'Категория удалена']);
    }

    // Секции
    public function getSections(): JsonResponse
    {
        return response()->json(['success' => true, 'data' => []]);
    }

    public function createSection(Request $request): JsonResponse
    {
        $request->validate(['name' => 'required|string|max:255']);
        return response()->json(['success' => true, 'message' => 'Секция создана'], 201);
    }

    public function updateSection(Request $request, $id): JsonResponse
    {
        $request->validate(['name' => 'required|string|max:255']);
        return response()->json(['success' => true, 'message' => 'Секция обновлена']);
    }

    public function deleteSection($id): JsonResponse
    {
        return response()->json(['success' => true, 'message' => 'Секция удалена']);
    }

    // Материалы
    public function getMaterials(): JsonResponse
    {
        return response()->json(['success' => true, 'data' => []]);
    }

    public function createMaterial(Request $request): JsonResponse
    {
        $request->validate(['name' => 'required|string|max:255']);
        return response()->json(['success' => true, 'message' => 'Материал создан'], 201);
    }

    public function updateMaterial(Request $request, $id): JsonResponse
    {
        $request->validate(['name' => 'required|string|max:255']);
        return response()->json(['success' => true, 'message' => 'Материал обновлен']);
    }

    public function deleteMaterial($id): JsonResponse
    {
        return response()->json(['success' => true, 'message' => 'Материал удален']);
    }

    // Рендеры
    public function getRenders(): JsonResponse
    {
        return response()->json(['success' => true, 'data' => []]);
    }

    public function createRender(Request $request): JsonResponse
    {
        $request->validate(['name' => 'required|string|max:255']);
        return response()->json(['success' => true, 'message' => 'Рендер создан'], 201);
    }

    public function updateRender(Request $request, $id): JsonResponse
    {
        $request->validate(['name' => 'required|string|max:255']);
        return response()->json(['success' => true, 'message' => 'Рендер обновлен']);
    }

    public function deleteRender($id): JsonResponse
    {
        return response()->json(['success' => true, 'message' => 'Рендер удален']);
    }

    // Цвета
    public function getColors(): JsonResponse
    {
        return response()->json(['success' => true, 'data' => []]);
    }

    public function createColor(Request $request): JsonResponse
    {
        $request->validate(['name' => 'required|string|max:255']);
        return response()->json(['success' => true, 'message' => 'Цвет создан'], 201);
    }

    public function updateColor(Request $request, $id): JsonResponse
    {
        $request->validate(['name' => 'required|string|max:255']);
        return response()->json(['success' => true, 'message' => 'Цвет обновлен']);
    }

    public function deleteColor($id): JsonResponse
    {
        return response()->json(['success' => true, 'message' => 'Цвет удален']);
    }

    // Программы
    public function getSofts(): JsonResponse
    {
        return response()->json(['success' => true, 'data' => []]);
    }

    public function createSoft(Request $request): JsonResponse
    {
        $request->validate(['name' => 'required|string|max:255']);
        return response()->json(['success' => true, 'message' => 'Программа создана'], 201);
    }

    public function updateSoft(Request $request, $id): JsonResponse
    {
        $request->validate(['name' => 'required|string|max:255']);
        return response()->json(['success' => true, 'message' => 'Программа обновлена']);
    }

    public function deleteSoft($id): JsonResponse
    {
        return response()->json(['success' => true, 'message' => 'Программа удалена']);
    }

    // Форматы
    public function getFormats(): JsonResponse
    {
        return response()->json(['success' => true, 'data' => []]);
    }

    public function createFormat(Request $request): JsonResponse
    {
        $request->validate(['name' => 'required|string|max:255']);
        return response()->json(['success' => true, 'message' => 'Формат создан'], 201);
    }

    public function updateFormat(Request $request, $id): JsonResponse
    {
        $request->validate(['name' => 'required|string|max:255']);
        return response()->json(['success' => true, 'message' => 'Формат обновлен']);
    }

    public function deleteFormat($id): JsonResponse
    {
        return response()->json(['success' => true, 'message' => 'Формат удален']);
    }

    // Полигоны
    public function getPolygons(): JsonResponse
    {
        return response()->json(['success' => true, 'data' => []]);
    }

    public function createPolygon(Request $request): JsonResponse
    {
        $request->validate(['name' => 'required|string|max:255']);
        return response()->json(['success' => true, 'message' => 'Полигонаж создан'], 201);
    }

    public function updatePolygon(Request $request, $id): JsonResponse
    {
        $request->validate(['name' => 'required|string|max:255']);
        return response()->json(['success' => true, 'message' => 'Полигонаж обновлен']);
    }

    public function deletePolygon($id): JsonResponse
    {
        return response()->json(['success' => true, 'message' => 'Полигонаж удален']);
    }

    // Стили
    public function getStyles(): JsonResponse
    {
        return response()->json(['success' => true, 'data' => []]);
    }

    public function createStyle(Request $request): JsonResponse
    {
        $request->validate(['name' => 'required|string|max:255']);
        return response()->json(['success' => true, 'message' => 'Стиль создан'], 201);
    }

    public function updateStyle(Request $request, $id): JsonResponse
    {
        $request->validate(['name' => 'required|string|max:255']);
        return response()->json(['success' => true, 'message' => 'Стиль обновлен']);
    }

    public function deleteStyle($id): JsonResponse
    {
        return response()->json(['success' => true, 'message' => 'Стиль удален']);
    }

    // Анимация
    public function getAnimation(): JsonResponse
    {
        return response()->json(['success' => true, 'data' => []]);
    }

    public function createAnimation(Request $request): JsonResponse
    {
        $request->validate(['name' => 'required|string|max:255']);
        return response()->json(['success' => true, 'message' => 'Анимация создана'], 201);
    }

    public function updateAnimation(Request $request, $id): JsonResponse
    {
        $request->validate(['name' => 'required|string|max:255']);
        return response()->json(['success' => true, 'message' => 'Анимация обновлена']);
    }

    public function deleteAnimation($id): JsonResponse
    {
        return response()->json(['success' => true, 'message' => 'Анимация удалена']);
    }

    // Прочее
    public function getOthers(): JsonResponse
    {
        return response()->json(['success' => true, 'data' => []]);
    }

    public function createOther(Request $request): JsonResponse
    {
        $request->validate(['name' => 'required|string|max:255']);
        return response()->json(['success' => true, 'message' => 'Элемент создан'], 201);
    }

    public function updateOther(Request $request, $id): JsonResponse
    {
        $request->validate(['name' => 'required|string|max:255']);
        return response()->json(['success' => true, 'message' => 'Элемент обновлен']);
    }

    public function deleteOther($id): JsonResponse
    {
        return response()->json(['success' => true, 'message' => 'Элемент удален']);
    }
}