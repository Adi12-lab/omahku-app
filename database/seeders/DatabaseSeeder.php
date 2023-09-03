<?php

namespace Database\Seeders;

use Database\Seeders\UserSeeder;
use App\Models\Category;
use App\Models\Feature;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Category::factory()->count(10)->create();
        Feature::factory()->count(40)->create();
        $this->call([
            UserSeeder::class,
        ]);
    }
}
