<?php

namespace Database\Seeders;

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
        User::create(['name' => 'psy', 'email' => 'psy@gmail.com', 'role' => 'psy', 'password' => 'psy123']);
        User::create(['name' => 'user', 'email' => 'user@gmail.com', 'role' => 'user', 'password' => 'user123']);
    }
}
