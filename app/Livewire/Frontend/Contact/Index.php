<?php

namespace App\Livewire\Frontend\Contact;

use Livewire\Attributes\Rule;
use Livewire\Component;

class Index extends Component
{
    #[Rule("required", message: "Sertakan nama anda")]
    public $name;

    #[Rule("required", message: "Sertakan nama Email")]
    #[Rule("email:rfc,dns", message: "Pastikan Email Valid")]
    public $email;

    #[Rule("min_digits:10", message: "No Telepon minimal 10 digit")]
    public $phone;
    
    
    #[Rule("required|string")]
    public $message;

    public function send() {
        $validated = $this->validate();


    }
    public function render()
    {
        return view('livewire.frontend.contact.index')->extends("layouts.app")->section("content");
    }
}
