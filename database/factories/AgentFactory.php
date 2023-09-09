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
            "whatsapp" => fake()->phoneNumber(),
            "description" => $mergeParagraphs
        ];
    }
}
