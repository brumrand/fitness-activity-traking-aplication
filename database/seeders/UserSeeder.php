<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'User1',
            'email' => 'user1@example.com',
            'password' => bcrypt('password123'),
        ]);

        User::create([
            'name' => 'User2',
            'email' => 'user2@example.com',
            'password' => bcrypt('password123'),
        ]);
    }
}
