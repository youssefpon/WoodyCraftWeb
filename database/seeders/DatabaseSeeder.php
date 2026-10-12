<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'client@woody.fr'],
            [
                'name' => 'Client Test',
                'password' => 'password',
                'role' => 'client',
            ]
        );

        User::firstOrCreate(
            ['email' => 'admin@woody.fr'],
            [
                'name' => 'Admin WoodyCraft',
                'password' => 'password',
                'role' => 'admin',
            ]
        );
    }
}