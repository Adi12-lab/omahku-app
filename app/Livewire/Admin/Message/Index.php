<?php

namespace App\Livewire\Admin\Message;

use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Carbon\Carbon;
use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    #[Locked]
    public $message_id;

    public function delete(int $message_id) {
        $this->message_id = $message_id;
        $this->dispatch("confirmDelete");
    }

    #[On("destroyMessage")]
    public function deleting() {
        $check = Message::where("receiver_id", Auth::user()->id)->where("id", $this->message_id)->first();
    
        if($check) {
            $check->delete();
            $this->dispatch("success");
        } else {
            $this->dispatch("failed");
        }
    }

    public function render()
    {   
        Message::where("receiver_id", Auth::user()->id)->whereNull("read_at")->update(["read_at" => now()]);
        $messages = Message::where("receiver_id", Auth::user()->id)->orderBy("created_at", "desc")->paginate(6);

        
        return view('livewire.admin.message.index')
                ->with(["messages" => $messages])
                ->extends("layouts.admin")->section("content");
    }
}
