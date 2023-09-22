<?php

namespace App\Livewire\Frontend\Property;

use App\Models\Property;
use App\Models\Wishlist;
use App\Models\PropertyFeature;
use App\Models\Message;
use App\Events\MessageDelivered;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Detail extends Component
{
    #[Locked]
    public $property;

    
    public function mount(Property $property) {
        $this->property = $property;
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
    
    #[Rule("required",message: "Nama harus diisi")]
    public $sender_name;

    #[Rule("required")]
    #[Rule("email:rfc,dns",message: "Email harus valid")]
    public $sender_email;

    #[Rule("required", message:"Nomor telepon harus diisi")]
    #[Rule("numeric", message:"Nomor telepon harus angka")]
    #[Rule("min:10", message:"Nomor telepon min 10 digit")]
    public $sender_phone;

    #[Rule("required", message:"Subjek harus diisi")]
    public $subject;

    #[Rule("required", message: "Sertakan pesan anda")]
    #[Rule("min:10", message: "Pesan minimal 10 karakter")]
    public $sender_message;
    public function sendMessage() {
        $payload = $this->validate();
        $payload["user_id"] = $this->property->agent->user->id;

        $message = new Message;
        $message->receiver_id = $this->property->agent->user->id;
        $message->name = $this->sender_name;
        $message->email = $this->sender_email;
        $message->phone = $this->sender_phone;
        $message->subject = $this->subject;
        $message->message = $this->sender_message;
        $message->save();

        broadcast(new MessageDelivered($payload, $payload["user_id"]))->toOthers();
        $this->reset('sender_name', 'sender_email', "sender_phone", "subject", "sender_message");
        $this->dispatch("successMessage");
        
        
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
                    
            if (Auth::check()) {
                $isInWishlist = Wishlist::where("user_id", Auth::user()->id)
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
