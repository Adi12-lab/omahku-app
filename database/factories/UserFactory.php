<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Agent;
use App\Models\Property;
use App\Models\Feature;
use App\Models\PropertyFeature;
use App\Models\PropertyImage;
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
            'role_as' => random_int(0, 1),
            'status' => random_int(0, 1)
        ];
    }

    public function agent($features): static
    {
        // $this->state([
        //     "role_as" == 1
        // ]); mengubah sekranag role_as nya menjadi 1
        return $this->afterCreating(function (User $user) use($features) {
            if($user->role_as === 1) {

                Agent::factory(1)->create(['user_id' => $user->id]);
                $user->refresh(); // Refresh instance User untuk memastikan koleksi agent diperbarui

                $user->agent->properties()->saveMany(Property::factory(8)->features($features)->create([
                    'agent_id' => $user->agent->id,
                ]));
                
                $user->agent->properties->each(function (Property $property) {
                    $property->propertyImages()->saveMany(PropertyImage::factory(10)->create([
                        'property_id' => $property->id,
                    ]));
                });


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
