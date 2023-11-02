<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::truncate();

        User::create([
            'name' => 'Yuri',
            'email' => 'yuri.alec@hotmail.com',
            'password' => bcrypt('12345678'),
            'role_id' => 1
        ]);
    }
}
