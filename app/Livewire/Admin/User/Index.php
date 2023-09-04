<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Exception;
use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
class Index extends Component
{
    use WithPagination;

    #[Locked]
    public $id;

    public function promoteToAgent(int $id) {
        $this->id = $id;
        try {
            $user = User::findOrFail($this->id);
            $this->dispatch("confirmToAgent", data: [
                "title" => "Promosi ke Agen",
                "text" => "\"$user->username\" akan dipromosikan menjadi agent",
                "type" => "warning"
            ]);

        } catch(Exception $e) {
            
        }
    }

    #[On("promotingToAgent")]
    public function promotingToAgent() {
        try {
            $user = User::findOrFail($this->id);
            $user->role_as = 1;
            $user->update();
    
            $this->dispatch("alert", data: [
                "title" => "Berhasil",
                "text" => "\"$user->username\" berhasil menjadi agen",
                "type" => "success",
            ]);
        } catch(Exception $e) {
            $this->dispatch("alert", data: [
                "title" => "Gagal",
                "text" => "Something went wrong",
                "type" => "warning"
            ]);
        } finally {
            $this->reset("id");
        }

    }

    public function suspend(int $id) {
        $this->id = $id;
        try {
            $user = User::findOrFail($this->id);
            $this->dispatch("confirmSuspend", data: [
                "title" => "Ban User",
                "text" => "\"$user->username\" akan Ban",
                "type" => "warning",
            ]);

        } catch(Exception $e) {
            
        }
    }

    #[On("suspending")]
    public function suspending() {
        try {
            $user = User::findOrFail($this->id);
            $user->status = 0;
            $user->update();
            $this->dispatch("alert", data: [
                "title" => "Ban User",
                "text" => "\"$user->username\" telah di Ban",
                "type" => "success",
            ]);

        } catch(Exception $e) {
            
        }
    }

    public function unsuspend(int $id) {
        $this->id = $id;
        try {
            $user = User::findOrFail($this->id);
            $this->dispatch("confirmUnSuspend", data: [
                "title" => "Aktifkan User",
                "text" => "\"$user->username\" akan diaktifkan kembali",
                "type" => "info",
            ]);

        } catch(Exception $e) {
            
        }
    }

    #[On("unsuspending")]
    public function unsuspending() {
        try {
            $user = User::findOrFail($this->id);
            $user->status = 1;
            $user->update();
            $this->dispatch("alert", data: [
                "title" => "Diaktifkan",
                "text" => "\"$user->username\" telah diaktifkan",
                "type" => "success",
            ]);

        } catch(Exception $e) {
            
        }
    }

    public function render()
    {
        $users = User::whereNot("role_as", 2)->paginate(5);
        return view('livewire.admin.user.index')->with(["users" => $users])->extends("layouts.admin")->section("content");
    }
}
