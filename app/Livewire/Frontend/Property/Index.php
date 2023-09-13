<?php

namespace App\Livewire\Frontend\Property;

use App\Models\Property;
use App\Models\Category;
use App\Models\Feature;
use App\Models\Location;

use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    
    use WithPagination;


    public $location = 0;

    public function filter() {
        dd($this->location);
    }

    public function render()
    {  
        $properties = Property::with(["agent", "category", "propertyImages", "location"])->paginate(6);
        $categories = Category::withCount('properties as property_count')->get();
        $locations = Location::all();
        $features = Feature::all();
        return view('livewire.frontend.property.index')
                ->with([
                    "properties" => $properties,
                    "categories" => $categories,
                    "locations" => $locations,
                    "features" => $features
                ])->extends("layouts.app")->section("content");
    }
}
