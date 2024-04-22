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
        // Create roles seed
        $roles = [
            [
                'name' => 'Admin',
                'description' => 'Administrator',
            ],
            [
                'name' => 'Doctor',
                'description' => 'Editor',
            ],
            [
                'name' => 'user',
                'description' => 'User',
            ],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }


    }
}
