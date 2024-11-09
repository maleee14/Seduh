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
        $user = [
            [
                'name' => 'Saya Admin',
                'email' => 'admin@gmail.com',
                'role' => 'admin',
                'password' => bcrypt('123123123'),
            ],
            [
                'name' => 'Ini User',
                'email' => 'user@gmail.com',
                'role' => 'user',
                'password' => bcrypt('123123123'),
            ],
        ];

        foreach ($user as $val) {
            User::create($val);
        }
    }
}
