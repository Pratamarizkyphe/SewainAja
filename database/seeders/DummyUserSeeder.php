<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DummyUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'role' => 'admin',
                'password' => bcrypt('password')
            ],
            [
                'name' => 'Owner',
                'email' => 'owner@gmail.com',
                'role' => 'owner',
                'password' => bcrypt('password')
            ],
            [
                'name' => 'User',
                'email' => 'user@gmail.com',
                'role' => 'user',
                'password' => bcrypt('password')
            ],
        ];

        try {
            DB::transaction(function () use ($userData) {
                foreach ($userData as $user) {
                    User::create($user);
                    echo "Seeding user: " . $user['name'] . "\n"; // Debug output
                }
            });
        } catch (\Exception $e) {
            Log::error('Seeding error: ' . $e->getMessage());
            echo 'Seeding error: ' . $e->getMessage();
        }
    }
}
