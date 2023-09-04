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
        "username" => "admin",
        "email" => "admin@gmail.com",
        "role_as" => 2,
        "status" => 1,
        'email_verified_at' => now(),
        "password" => "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi",
    ]);
    User::create([
        "username" => "agen",
        "email" => "agent@gmail.com",
        "role_as" => 1,
        "status" => 1,
        'email_verified_at' => now(),
        "password" => "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi",
    ]);
    
     User::factory(30)->agent()->create();   
    }
}
