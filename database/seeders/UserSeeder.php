<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Admin Account
        User::create([
            'name' => 'System Admin',
            'email' => 'admin@mna.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // 2. Seller Account
        User::create([
            'name' => 'Nguyễn Văn A (Seller)',
            'email' => 'seller@example.com',
            'password' => Hash::make('password'),
            'role' => 'seller',
        ]);

        // 3. Buyer Account
        User::create([
            'name' => 'Trần Thị B (Buyer)',
            'email' => 'buyer@example.com',
            'password' => Hash::make('password'),
            'role' => 'buyer',
        ]);
    }
}
