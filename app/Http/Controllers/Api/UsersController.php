<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Список пользователей
     * GET /api/users
     */
    public function index(Request $request): JsonResponse
    {
        try {
            // Тестовые данные пользователей
            $users = [
                [
                    'id' => 1,
                    'name' => 'Администратор',
                    'email' => 'admin@cgarea.ru',
                    'role' => 'admin',
                    'status' => 'active',
                    'balance' => 1500.00,
                    'models_count' => 25,
                    'created_at' => '2024-01-01'
                ],
                [
                    'id' => 2,
                    'name' => 'Модератор',
                    'email' => 'moderator@cgarea.ru',
                    'role' => 'moderator',
                    'status' => 'active',
                    'balance' => 750.00,
                    'models_count' => 12,
                    'created_at' => '2024-01-05'
                ],
                [
                    'id' => 3,
                    'name' => 'Дизайнер 3D',
                    'email' => 'designer@cgarea.ru',
                    'role' => 'user',
                    'status' => 'active',
                    'balance' => 2500.00,
                    'models_count' => 50,
                    'created_at' => '2024-01-10'
                ]
            ];

            return response()->json([
                'success' => true,
                'data' => $users,
                'total' => count($users)
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Ошибка загрузки пользователей',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Создание пользователя
     * POST /api/users
     */
    public function store(Request $request): JsonResponse
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:8',
                'role' => 'required|in:admin,moderator,user,studio'
            ]);

            $user = [
                'id' => rand(1000, 9999),
                'name' => $request->name,
                'email' => $request->email,
                'role' => $request->role,
                'status' => 'active',
                'balance' => 0,
                'created_at' => now()
            ];

            return response()->json([
                'success' => true,
                'data' => $user,
                'message' => 'Пользователь успешно создан'
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Ошибка создания пользователя',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Получение пользователя по ID
     * GET /api/users/{id}
     */
    public function show($id): JsonResponse
    {
        try {
            $user = [
                'id' => $id,
                'name' => 'Тестовый пользователь',
                'email' => 'test@example.com',
                'role' => 'user',
                'status' => 'active',
                'balance' => 500.00,
                'models_count' => 10
            ];

            return response()->json([
                'success' => true,
                'data' => $user
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Пользователь не найден',
                'error' => $e->getMessage()
            ], 404);
        }
    }

    /**
     * Обновление пользователя
     * PUT /api/users/{id}
     */
    public function update(Request $request, $id): JsonResponse
    {
        try {
            $request->validate([
                'name' => 'sometimes|required|string|max:255',
                'email' => 'sometimes|required|email',
                'role' => 'sometimes|required|in:admin,moderator,user,studio',
                'status' => 'sometimes|required|in:active,blocked'
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Пользователь успешно обновлен'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Ошибка обновления пользователя',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Удаление пользователя
     * DELETE /api/users/{id}
     */
    public function destroy($id): JsonResponse
    {
        try {
            return response()->json([
                'success' => true,
                'message' => 'Пользователь успешно удален'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Ошибка удаления пользователя',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Баланс и история транзакций пользователя
     * GET /api/users/{id}/wallet
     */
    public function wallet($id): JsonResponse
    {
        try {
            $wallet = [
                'user_id' => $id,
                'balance' => 1250.50,
                'transactions' => [
                    [
                        'id' => 1,
                        'type' => 'income',
                        'amount' => 500.00,
                        'description' => 'Продажа модели "Стул офисный"',
                        'date' => '2024-01-15'
                    ],
                    [
                        'id' => 2,
                        'type' => 'withdrawal',
                        'amount' => 200.00,
                        'description' => 'Вывод средств',
                        'date' => '2024-01-10'
                    ]
                ]
            ];

            return response()->json([
                'success' => true,
                'data' => $wallet
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Ошибка загрузки данных кошелька',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}