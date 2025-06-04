<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Получить статистику для дашборда
     */
    public function getStats(): JsonResponse
    {
        try {
            // Получаем реальные данные из базы
            $totalUsers = User::count();
            $activeUsers = User::where('status', 'active')->count();
            $blockedUsers = User::where('status', 'blocked')->count();
            
            // Если таблицы моделей еще нет, используем базовую статистику
            $stats = [
                'users' => [
                    'total' => $totalUsers,
                    'active' => $activeUsers,
                    'blocked' => $blockedUsers,
                    'new_today' => User::whereDate('created_at', today())->count(),
                ],
                'models' => [
                    'total' => 0,
                    'pending' => 0,
                    'approved' => 0,
                    'rejected' => 0,
                ],
                'system' => [
                    'server_status' => 'online',
                    'database_status' => 'connected',
                    'cache_status' => 'active',
                ],
            ];

            return response()->json([
                'success' => true,
                'data' => $stats,
                'timestamp' => now()->toISOString(),
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Ошибка получения статистики',
                'error' => config('app.debug') ? $e->getMessage() : 'Внутренняя ошибка сервера',
            ], 500);
        }
    }

    /**
     * Получить последних пользователей
     */
    public function getRecentUsers(): JsonResponse
    {
        $recentUsers = User::orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return response()->json([
            'success' => true,
            'data' => $recentUsers,
        ]);
    }

    /**
     * Получить последние модели
     */
    public function getRecentModels(): JsonResponse
    {
        // Таблица моделей пока отсутствует, поэтому возвращаем статичную структуру
        $models = [
            [
                'id' => 1,
                'name' => 'Тестовая модель',
                'status' => 'pending',
                'created_at' => now()->toISOString(),
            ],
        ];

        return response()->json([
            'success' => true,
            'data' => $models,
        ]);
    }
}