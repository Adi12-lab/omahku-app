<?php

namespace Tests\Unit;

use App\Models\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Tests\TestCase;

class PropertyControllerTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        // Create and authenticate a user here if needed
        $user = User::factory()->create();
        Auth::login($user);
    }

    /** @test */
    public function it_can_store_a_property()
    {
        // File::fake('public/uploads');

        // $file = UploadedFile::fake()->image('property.jpg');

        $response = $this->post(route('property.store'), [
            'name' => 'Test Property',
            'slug' => 'test-property',
            'category_id' => 1,
            'for' => 'on',
            'status' => "on",
            'isFeatured' => "on",
            'size' => 100,
            'small_description' => 'Small Description',
            'description' => "This is a description",
            // 'images' => [$file],
            "year_built" => ["date"],
            "subdistrict_id" => 43,
            "bathrooms" => 32,
            "bedrooms" => 32,
            "rooms" => 32,
            "for" => "on",
            "status" => "on",
            "price" => 4343543534,
            "isFeatured" => "on",
            "previous_image.*" => ["nullable", "integer"],
            "address" => "wehfhwe foewlofh wflaewhfalef",
            "latitude" => -32,32432,
            "longitude" => 78,4345345,
            "map_iframe" => "fnwelfnela.fnlafnklefefwefew",
            "street_iframe" => "jewflkjewflajfkjeflkhefjhkwehfkwe",
            
           // You might need to create features in the database before this step.
           // Use factories to generate them.
           //
           'features'=> [1,2,3] 
           
         ]);

         $response->assertRedirect(route('property.index'));
         $response->assertSessionHas('message', "Properti Test Property berhasil ditambahkan");

         $this->assertDatabaseHas('properties', [
             'name'=>  "Test Property",
             'slug' => 'test-property',
            'category_id' => 1,
            'for' => 'on',
            'status' => "on",
            'isFeatured' => "on",
            'size' => 100,
            'small_description' => 'Small Description',
            'description' => "This is a description",
            // 'images' => [$file],
            "year_built" => ["date"],
            "subdistrict_id" => 43,
            "bathrooms" => 32,
            "bedrooms" => 32,
            "rooms" => 32,
            "for" => "on",
            "status" => "on",
            "price" => 4343543534,
            "isFeatured" => "on",
            "previous_image.*" => ["nullable", "integer"],
            "address" => "wehfhwe foewlofh wflaewhfalef",
            "latitude" => -32,32432,
            "longitude" => 78,4345345,
            "map_iframe" => "fnwelfnela.fnlafnklefefwefew",
            "street_iframe" => "jewflkjewflajfkjeflkhefjhkwehfkwe",
         ]);

        //   File::disk('public/uploads')->assertExists("uploads/property/{$file->hashName()}");
        //   $this->assertDatabaseHas('property_images', ['image'=>"uploads/property/{$file->hashName()}"]);
          
          $this->assertDatabaseHas('property_features', ['feature_id'=>1]);
          $this->assertDatabaseHas('property_features', ['feature_id'=>2]);
          $this->assertDatabaseHas('property_features', ['feature_id'=>3]);
          
          
     }
}
