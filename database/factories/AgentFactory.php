<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Agent>
 */
class AgentFactory extends Factory
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
            "name" => fake()->name(),
            "status" => mt_rand(0, 1),
            "facebook" => "facebook.com",
            "instagram" => "instagram.com",
            "twitter" => "twitter.com",
            "linkedin" => "linkedin.com",
            "youtube" => "youtube.com",
            "whatsapp" => preg_replace("/[^a-zA-Z0-9]/", "", fake()->phoneNumber()),
            "emailAgent" => fake()->unique()->freeEmail(),
            "description" => $mergeParagraphs,
            "image" => "https://source.unsplash.com/500x500?person",
        ];
    }
}
