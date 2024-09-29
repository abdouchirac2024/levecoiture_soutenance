<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'id'=>1,
            'title'=>'admin'
        ],
    );

    Role::create([
        'id'=>2,
        'title'=>'driver'
    ],
    );

    Role::create([
        'id'=>3,
        'title'=>'client'
    ],
    );
    }
}
