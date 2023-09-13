<?php

namespace App\Livewire\Frontend\Property;

use App\Models\Property;
use App\Models\PropertyFeature;
use Livewire\Attributes\Locked;
use Livewire\Component;

class Detail extends Component
{
    #[Locked]
    public $property;
    public function mount(Property $property) {
        $this->property = $property;
    }
    public function render()
    {
        $propertyFeatures = PropertyFeature::with(["feature"])->where("property_id", $this->property->id)->get();
        $similiarProperties = Property::with(["propertyImages", "agent", "location", "agent", "category"])
                                        ->where("category_id", $this->property->category_id)
                                        ->inRandomOrder()
                                        ->limit(6)->get();
        return view('livewire.frontend.property.detail')
                ->with([
                    "property" => $this->property,
                    "propertyFeatures" => $propertyFeatures,
                    "similiarProperties" => $similiarProperties
                ])
                ->extends("layouts.app")->section("content");
    }
}
