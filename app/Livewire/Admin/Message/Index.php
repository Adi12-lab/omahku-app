<?php

namespace App\Livewire\Admin\Message;

use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Carbon\Carbon;

class Index extends Component
{
    public function render()
    {
        $messages = Message::where("receiver_id", Auth::user()->id)->orderBy("created_at", "desc")->get();
        $messages = collect($messages)->each(function($message) {
            $message["sended_at"] = Carbon::parse($message["created_at"])->diffForHumans();
        });

        return view('livewire.admin.message.index')
                ->with(["messages" => $messages])
                ->extends("layouts.admin")->section("content");
    }
}
