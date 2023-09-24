<?php

namespace App\Livewire\Frontend\Contact;

use App\Models\User;
use App\Models\Message;

use App\Events\MessageDelivered;

use Livewire\Attributes\Rule;
use Livewire\Component;

class Index extends Component
{
    #[Rule("required", message: "Sertakan nama anda")]
    public $sender_name;

    #[Rule("required", message: "Sertakan nama Email")]
    #[Rule("email:rfc,dns", message: "Pastikan Email Valid")]
    public $sender_email;

    #[Rule("min_digits:10", message: "No Telepon minimal 10 digit")]
    public $sender_phone;
    

    #[Rule("required|string")]
    public $subject;

    #[Rule("required|string")]
    public $sender_message;

    public function send() {
        $payload = $this->validate();
        $message = new Message;
        $adminId = User::firstWhere("role_as", 2)->id;
        $message->receiver_id = $adminId;
        $message->name = $payload["sender_name"];
        $message->email = $payload["sender_email"];
        $message->phone = $payload["sender_phone"];
        $message->subject = $payload["subject"];
        $message->message = $payload["sender_message"];
        $message->save();

        broadcast(new MessageDelivered($payload, $adminId))->toOthers();
        $this->dispatch("success");
    }
    public function render()
    {
        return view('livewire.frontend.contact.index')->extends("layouts.app")->section("content");
    }
}
