<?php

namespace Database\Seeders;

use App\Enums\RoleEnum;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (RoleEnum::cases() as $role) {
            $userData = match ($role) {
                RoleEnum::ADMIN => [
                    'first_name' => 'Admin',
                    'last_name' => 'User',
                    'email' => 'admin@admin.com',
                ],
                RoleEnum::TRAVEL_AGENT => [
                    'first_name' => 'Travel',
                    'last_name' => 'Agent',
                    'email' => 'travel@agent.com',
                ],
                RoleEnum::USER => [
                    'first_name' => 'Regular',
                    'last_name' => 'User',
                    'email' => 'user@user.com',
                ],
            };

            User::factory()->create(array_merge([
                'role' => $role->value,
            ], $userData));
        }
    }
}
