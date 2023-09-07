<?php

namespace App\Livewire\Admin\Agent;

use App\Models\Agent;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Locked;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;

class Index extends Component
{
    use WithPagination;
    #[Locked]
    public $id;

    public function suspend(int $id) {
        $this->id = $id;
            $agent = Agent::find($this->id);
            $this->dispatch("confirmSuspend", data: [
                "title" => "Ban agent",
                "text" => "\"$agent->name\" akan Ban",
                "type" => "warning",
            ]);
    }

    #[On("suspending")]
    public function suspending() {
            $agent = Agent::find($this->id);
            $agent->status = 0;
            $agent->update();
            $this->dispatch("alert", data: [
                "title" => "Ban agen",
                "text" => "\"$agent->name\" telah di Ban",
                "type" => "success",
            ]);

    }

    public function unsuspend(int $id) {
        $this->id = $id;
     
            $agent = Agent::find($this->id);
            $this->dispatch("confirmUnSuspend", data: [
                "title" => "Aktifkan User",
                "text" => "\"$agent->name\" akan diaktifkan kembali",
                "type" => "info",
            ]);

       
    }

    #[On("unsuspending")]
    public function unsuspending() {
            $agent = Agent::find($this->id);
            $agent->status = 1;
            $agent->update();
            $this->dispatch("alert", data: [
                "title" => "Diaktifkan",
                "text" => "\"$agent->name\" telah diaktifkan",
                "type" => "success",
            ]);

    }

    public function delete(int $id) {
        $this->id = $id;
            $agent = Agent::find($this->id);
            $this->dispatch("confirmDelete", data: [
                "title" => "Hapus Agen",
                "text" => "\"$agent->name\" akan di hapus",
                "type" => "warning",
            ]);
    }

    #[On('deleting')]
    public function destroying() {

        $agent = Agent::find($this->id);
        if(File::exists($agent->image)) {
            File::delete($agent->image);
        }
        $agent->delete();
        $agent->user->update(["role_as" => 1]);
        $this->dispatch("alert", data: [
            "title" => "dihapus",
            "text" => "\"$agent->name\" telah dihapus",
            "type" => "success",
        ]);
    }

    public function render()
    {
        $agents = User::select(DB::raw("agents.id, agents.name, agents.status, users.username, users.email"))->
                        leftJoin("agents", "agents.user_id", '=', 'users.id')->where("users.role_as", 1)->paginate(5);
        return view('livewire.admin.agent.index')->with(["agents" => $agents])->extends("layouts.admin")->section("content");
    }
}
