<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Создаем администратора
        User::create([
            'name' => 'Администратор',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);

        // Создаем модератора
        User::create([
            'name' => 'Модератор',
            'email' => 'moderator@test.com',
            'password' => Hash::make('password'),
            'role' => 'moderator',
            'email_verified_at' => now(),
        ]);

        // Создаем обычного пользователя
        User::create([
            'name' => 'Пользователь',
            'email' => 'user@test.com',
            'password' => Hash::make('password'),
            'role' => 'user',
            'email_verified_at' => now(),
        ]);
    }
}