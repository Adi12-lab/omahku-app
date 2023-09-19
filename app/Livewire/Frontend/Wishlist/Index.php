<?php

namespace App\Livewire\Frontend\Wishlist;

use App\Models\Wishlist;
use App\Models\PropertyImage;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
class Index extends Component
{
    #[Locked]
    public $wishlist;

    public function removeToWishlist(int $wishlist_id) {
        $wishlist = Wishlist::find($wishlist_id);
        $this->authorize('delete', $wishlist);
        $this->wishlist = $wishlist;
        $this->dispatch("confirmRemove", data: [
            "title" => "Hapus Favorit",
            "text" => "\"{$wishlist->property->name}\" akan dihapus",
            "type" => "warning",
        ]);
        }


    #[On("removing")]
    public function removing() {
        // dd(sprintf('"%s" telah dihapus', $this->wishlist->property->name));
        $this->wishlist->delete();
        $this->dispatch("alert", data: [
            "title" => "Hapus Favorit",
            "text" => sprintf('"%s" telah dihapus', $this->wishlist->property->name),
            "type" => "success",
        ]);
    }

    public function render()
    {
        $wishlists = Wishlist::select("wishlists.id as wishlist_id",'properties.*', 'property_images.image as image', "agents.name as agent")
        ->join('properties', 'wishlists.property_id', '=', 'properties.id')
        ->join("agents", "properties.agent_id", "=", "agents.id")
        ->joinSub(
            PropertyImage::select('property_id', DB::raw('MIN(id) as id'))
                ->groupBy('property_id'), 'min_property_images', function ($join) 
                {  
                    $join->on('properties.id', '=', 'min_property_images.property_id'); 
                }
        )
        ->join(
            'property_images',
             function($join){
                 $join->on( "min_property_images.property_id", "=", "property_images.property_id")
                      ->on("min_property_images.id", "=", "property_images.id");
             }
         )
        ->where("wishlists.user_id", Auth::user()->id)
        ->get();
    
            //  dd($wishlists);
        return view('livewire.frontend.wishlist.index')
                    ->with([
                        "wishlists" => $wishlists
                    ])
                    ->extends("layouts.app")->section("content");
    }
}
