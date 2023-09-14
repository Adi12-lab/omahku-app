<?php

namespace App\Livewire\Admin\Feature;

use App\Models\Feature;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Rule;
use Livewire\Attributes\On;

use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    #[Locked]
    public $feature_id;

    #[Rule("required")]
    public $name;
    
    public $status = true;

    public function save() {
        $this->validate();
        if(!Feature::firstWhere("name", $this->name)) {

            $feature = new Feature;
            $feature->name = $this->name;
            $feature->save();
            
            session()->flash("message", "Fasilitas berhasil ditambahkan");
            $this->reset("name", "status");
            $this->dispatch("close-modal");
        }
    }

    public function edit(int $feature_id) {
        $this->feature_id = $feature_id;
        $feature = Feature::findOrFail($feature_id);
        $this->name = $feature->name;
    }

    public function update() {
        $this->validate();
        Feature::findOrFail($this->feature_id)->update([
            "name" => $this->name,
        ]);
        session()->flash("message", "Fasilitas $this->name berhasil diedit");
        $this->reset("name", "status");
        $this->dispatch("close-modal");
    }

    public function delete(int $feature_id) {
        $this->feature_id = $feature_id;
        $this->dispatch("deletetingfeature", data: [
            "name" => feature::find($this->feature_id)->name
        ]);
    }

    #[On("destroyfeature")]
    public function destroy() {
        Feature::find($this->feature_id)->delete();
        session()->flash("message", "Fasilitas berhasil dihapus");
    }

    public function render()
    {
        $features = Feature::paginate(10);
        return view('livewire.admin.feature.index')
                ->with([
                    "features" => $features
                ])
                ->extends("layouts.admin")
                ->section("content");
    }
}
