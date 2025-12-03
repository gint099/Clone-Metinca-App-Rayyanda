<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::create([
    'name' => 'Admin User',
    'email' => 'admin@example.com',
    'password' => bcrypt('password'),
    'role' => 'admin'
]);

User::create([
    'name' => 'QC User',
    'email' => 'qc@example.com',
    'password' => bcrypt('password'),
    'role' => 'quality-checker'
]);

User::create([
    'name' => 'PIC User',
    'email' => 'pic@example.com',
    'password' => bcrypt('password'),
    'role' => 'pic'
]);

    }
}
