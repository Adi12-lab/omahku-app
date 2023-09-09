<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $fakeParagraphs = fake()->paragraphs(4);
        $mergeParagraphs = '<p>' . implode('</p><p>', $fakeParagraphs) . '</p>';

        return [
            "name" => fake()->sentence(),
            "slug" => Str::slug(fake()->sentence()),
            "category_id" => mt_rand(1,10),
            "for" => mt_rand(0, 1),
            "status" => mt_rand(0, 1),
            "isFeatured" => mt_rand(0, 1),
            "size" => fake()->randomNumber() ,
            "price" => fake()->numberBetween(1000000, 999999999 ),
            "description" => $mergeParagraphs,
            "bedrooms" => mt_rand(1, 43),
            "bathrooms" => mt_rand(1, 43),
            "rooms" => mt_rand(1, 100),
            "year_built" => fake()->date(),
            "subdistrict_id" => mt_rand(3427, 3447),
            "address" => fake()->address(),
            "latitude" => fake()->latitude(),
            "longitude" => fake()->longitude(),
            
        ];
    }
}
