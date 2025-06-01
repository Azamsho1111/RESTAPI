<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class DashboardController extends Controller
{
    /**
     * Получить статистику для дашборда админ-панели
     *
     * @return JsonResponse
     */
    public function stats(): JsonResponse
    {
        try {
            // Здесь будет реальная логика получения статистики из базы данных
            // Пока возвращаем тестовые данные для проверки подключения
            
            $stats = [
                'total_models' => 1250,
                'pending_models' => 45,
                'approved_models' => 1180,
                'rejected_models' => 25,
                'total_users' => 340,
                'active_users' => 285,
                'monthly_uploads' => [120, 150, 180, 165, 200, 220, 195, 210, 185, 225, 240, 260],
                'daily_downloads' => [45, 67, 52, 78, 89, 65, 72],
                'revenue' => 125000
            ];

            return response()->json([
                'success' => true,
                'data' => $stats
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Ошибка загрузки статистики',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}