<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Agent;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{

    
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    
    public function definition(): array
    {

        return [
            'username' => $this->faker->unique()->userName(),
            'email' => $this->faker->unique()->freeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'role_as' => random_int(0, 1)
        ];
    }

    public function agent(): static
    {
        // $this->state([
        //     "role_as" == 1
        // ]); mengubah sekranag role_as nya menjadi 1
        return $this->afterCreating(function (User $user) {
            if($user->role_as === 1) {
                $fakeParagraphs = fake()->paragraphs(4);
                $mergeParagraphs = '<p>' . implode('</p><p>', $fakeParagraphs) . '</p>';
                Agent::create([
                    'user_id' => $user->id,
                    "name" => fake()->name(),
                    "phone" => fake()->phoneNumber(),
                    "email" => fake()->freeEmail(),
                    "facebook" => fake()->domainName(),
                    "twitter" => fake()->domainName(),
                    "instagram" => fake()->domainName(),
                    "whatsapp" => fake()->phoneNumber(),
                    "description" => $mergeParagraphs,
                ]);

            }
        });
    }
    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
