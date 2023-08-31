<?php

namespace App\Livewire\Frontend\Auth;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class Register extends Component
{

    public $username = null;
    public $email = null;
    public $password = null;
    public $password_confirmation = null;

    public function save()
        { 
            
        $this->validate([
            'username' => 'required|string|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);
        User::create([
            'username' => $this->username,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);
        
    }

    public function render()
    {
        return view('livewire.frontend.auth.register')->extends("layouts.app")->section("content");
    }
}
