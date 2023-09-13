<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\File;

use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Url;
class Index extends Component
{
    use WithPagination;

    #[Locked]
    public $id;

    #[Url(as: 'q')] 
    public $search = null;


    public function query() {
        $this->resetPage();
    }


    public function promoteToAgent(int $id) {
        $this->id = $id;
     
            $user = User::find($this->id);
            $this->dispatch("confirmToAgent", data: [
                "title" => "Promosi ke Agen",
                "text" => "\"$user->username\" akan dipromosikan menjadi agent",
                "type" => "warning"
            ]);
     
    }

    #[On("promotingToAgent")]
    public function promotingToAgent() {
       
            $user = User::find($this->id);
            $user->role_as = 1;
            $user->update();

            
    
            $this->dispatch("alert", data: [
                "title" => "Berhasil",
                "text" => "\"$user->username\" berhasil menjadi agen",
                "type" => "success",
            ]);

    }

    public function suspend(int $id) {
        $this->id = $id;

            $user = User::find($this->id);
            $this->dispatch("confirmSuspend", data: [
                "title" => "Ban User",
                "text" => "\"$user->username\" akan Ban",
                "type" => "warning",
            ]);

    }

    #[On("suspending")]
    public function suspending() {
     
            $user = User::find($this->id);
            $user->status = 0;
            $user->update();
            $this->dispatch("alert", data: [
                "title" => "Ban User",
                "text" => "\"$user->username\" telah di Ban",
                "type" => "success",
            ]);
    }

    public function unsuspend(int $id) {
        $this->id = $id;
      
            $user = User::find($this->id);
            $this->dispatch("confirmUnSuspend", data: [
                "title" => "Aktifkan User",
                "text" => "\"$user->username\" akan diaktifkan kembali",
                "type" => "info",
            ]);

    }

    #[On("unsuspending")]
    public function unsuspending() {
  
        $user = User::find($this->id);
        $user->status = 1;
        $user->update();
        $this->dispatch("alert", data: [
            "title" => "Diaktifkan",
            "text" => "\"$user->username\" telah diaktifkan",
            "type" => "success",
        ]);
    }

    public function downgrade(int $id) {
        $this->id = $id;
        $user = User::find($id);
        $this->dispatch("confirmDowngrade", data: [
            "title" => "Diturunkan",
            "text" => "\"$user->username\" akan diturunkan",
            "type" => "info",
        ]);
    }

    #[On('downgrading')]
    public function downgrading() {
        $user = User::find($this->id);
        if($user->agent) {
            if(File::exists($user->agent->image)) {
                File::delete($user->agent->image);
            }
            $user->agent->delete();
        }
        $user->role_as = 0;
        $user->update();
        $this->dispatch("alert", data: [
            "title" => "Berhasil diturunkan",
            "text" => "\"$user->username\" berhasil diturunkan",
            "type" => "success",
        ]);
    }

    // ----- Delete User -----
    public function delete(int $id) {
        $this->id = $id;
        $user = User::find($id);
        $this->dispatch("confirmDelete", data: [
                "title" => "Dihapus",
                "text" => "\"$user->username\" akan dihapus",
                "type" => "warning",
            ]);
    }

    #[On('deleting')]
    public function destroying() {

        $user = User::find($this->id);
        if(File::exists($user->image)) {
            File::delete($user->image);
        }
        $user->delete();
        $this->dispatch("alert", data: [
            "title" => "dihapus",
            "text" => "\"$user->username\" telah dihapus",
            "type" => "success",
        ]);
    }

    

    public function render()
    {
        $users = User::whereNot("role_as", 2);

        if($this->search) {
            $users->where(function($q) {
                $q->where("username", "like", "%".$this->search."%")
                  ->orWhere("email", "like", "%".$this->search."%");  
            }); 
        }
        $users = $users->paginate(5);
        return view('livewire.admin.user.index')->with(["users" => $users])->extends("layouts.admin")->section("content");
    }
}
