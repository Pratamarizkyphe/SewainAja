<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name'=>'Admin',
                'email'=>'admin@gmail.com',
                'role'=>'admin',
                'password'=>bcrypt('password')
            ],
            [
                'name'=>'Owner',
                'email'=>'owner@gmail.com',
                'role'=>'owner',
                'password'=>bcrypt('password')
            ],
            [
                'name'=>'User',
                'email'=>'user@gmail.com',
                'role'=>'user',
                'password'=>bcrypt('password')
            ],
            
        ];

        foreach ($userData as $key => $val) {
            User::create($val);
        }
    }
}
