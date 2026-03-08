<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin BrieLLaSparepart',
            'email' => 'admin@briellasparepart.com',
            'password' => Hash::make('admin123'),
            'role' => 'superadmin',
        ]);
    }
}
