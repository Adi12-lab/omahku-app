<?php

namespace Database\Factories;

use App\Models\Feature;
use App\Models\Property;
use App\Models\PropertyFeature;
use Doctrine\Inflector\Rules\Word;
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
            "name" => Str::random(8),
            "slug" => Str::slug(fake()->word()." ".fake()->word()),
            "category_id" => mt_rand(1,10),
            "for" => mt_rand(0, 1),
            "status" => mt_rand(0, 1),
            "isFeatured" => mt_rand(0, 1),
            "size" => mt_rand(100, 700),
            "price" => fake()->numberBetween(1000000, 999999999 ),
            "small_description" => fake()->sentence(),
            "description" => $mergeParagraphs,
            "bedrooms" => mt_rand(1, 43),
            "bathrooms" => mt_rand(1, 43),
            "rooms" => mt_rand(1, 100),
            "year_built" => fake()->date(),
            "subdistrict_id" => mt_rand(3427, 3447),
            "address" => fake()->address(),
            "latitude" => fake()->latitude(),
            "longitude" => fake()->longitude(),
            "map_iframe" => "https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d50446.89789906054!2d-122.41577600000001!3d37.791654!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xd473843de08ff793!2sBetter%20Property%20Management!5e0!3m2!1sen!2sus!4v1591226304089!5m2!1sen!2sus",
            "street_iframe" => "https://www.google.com/maps/embed?pb=!4v1553797194458!6m8!1m7!1sR4K_5Z2wRHTk9el8KLTh9Q!2m2!1d36.82551718071267!2d-76.34864590837246!3f305.15097!4f0!5f0.7820865974627469"
            
        ];
    }

    public function features($features) {
        return $this->afterCreating(function(Property $property) use($features) {
            //generate random number sampai number feature yang tersedia
            $rand = mt_rand(1, $features->count());
            $manyRandomFeature = $features->random($rand);
            $manyRandomFeature->each(function(Feature $feature) use ($property) {

                PropertyFeature::create([
                    "property_id" => $property->id,
                    "feature_id" => $feature->id
                ]);

            });

        });
    }
}
