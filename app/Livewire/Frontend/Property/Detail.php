<?php

namespace App\Livewire\Frontend\Property;

use App\Models\Property;
use App\Models\Wishlist;
use App\Models\PropertyFeature;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Locked;
use Livewire\Component;

class Detail extends Component
{
    #[Locked]
    public $property, $user;
    
    public function mount(Property $property) {
        $this->property = $property;
        $this->user = Auth::user();
    }

    public function addToWishlist(int $property_id) {
        if(Auth::check()) {

            if(Wishlist::where("user_id", auth()->user()->id)->where("property_id", $property_id)->exists()) {
                $this->dispatch("wishlistAlert", message: [
                    "head" => "Sudah ditambahkan",
                    "text" => "{$this->property->name} Sudah ditambahkan ke Favorit",
                    "type" => "success",
               ]);
                return false; 

            }
             else {
                Wishlist::create([
                     "user_id" => auth()->user()->id,
                     "property_id" => $property_id
                 ]);
                $this->dispatch("wishlistAlert", message: [
                    "head" => "Berhasil",   
                    "text" => "Properti {$this->property->name} berhasil ditambhkan ke Favorit",
                    "type" => "success",
               ]);
                 return true;
             }
        }
        else {
            return to_route("login");

        }
    }

    public function render()
    {
        $propertyFeatures = PropertyFeature::with(["feature"])->where("property_id", $this->property->id)->get();
        $similiarProperties = Property::with(["propertyImages", "agent", "location", "agent", "category"])
                                        ->where("category_id", $this->property->category_id)
                                        ->inRandomOrder()
                                        ->limit(6)->get();
                                        // dd($this->user->id);
        $isInWishlist = false;
                    
            if ($this->user !== null) {
                $isInWishlist = Wishlist::where("user_id", $this->user->id)
                            ->where("property_id", $this->property->id)
                            ->exists();
                    }
                    
        return view('livewire.frontend.property.detail')
                ->with([
                    "property" => $this->property,
                    "propertyFeatures" => $propertyFeatures,
                    "similiarProperties" => $similiarProperties,
                    "isInWishlist" => $isInWishlist
                ])
                ->extends("layouts.app")->section("content");
    }
}
