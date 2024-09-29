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
        User::create([
            'id'=>1,
            'name'=>"Admin",
            'email'=>"admin@driver.com",
            'role_id'=>1,
            'password'=>bcrypt('password'),
        ],
        );

        User::create([
            'id'=>2,
            'name'=>"alain",
            'email'=>"Alain@gmail.com",
            'role_id'=>2,
            'password'=>bcrypt('password'),
        ],
        );

        User::create([
            'id'=>3,
            'name'=>"user",
            'email'=>"user@gmail.com",
            'role_id'=>3,
            'password'=>bcrypt('password'),
        ],
        );
    }
}
