<?php

namespace App\Livewire\Admin\PropertyFLoor;

use App\Models\PropertyFloor;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Rule;

class Index extends Component
{
    use WithFileUploads;

    #[Locked]
    public $property, $id;

    public $property_floors;

    #[Rule("required|string")]
    public $size, $description; 

    public $previous_image;

    #[Rule('required|image|max:1024')]
    public $image;

    public function mount($data, $property) {
        $this->property_floors = $data;
        $this->property = $property;
    }

    public function save() {
        $floor = new PropertyFloor;
        $floor->property_id = $this->property->id;
        $floor->size = $this->size;
        $floor->description = $this->description;
        $uploadPath = 'uploads/floor/';

        $extension = $this->image->getClientOriginalExtension();
        $nameFile = "{$this->property->slug}-" . time() . ".{$extension}";
        $this->image->storeAs($uploadPath, $nameFile, "public_uploads");
        $floor->image = $uploadPath.$nameFile;
        $floor->save();
        $this->reset("size, description, image");
        $this->dispatch("close-modal");
        return session()->flash("message", "Lantai berhasil ditambahkan");
    }

    public function edit(int $floor_id) {
        $this->id = $floor_id;
        $floor = PropertyFloor::find($floor_id);
        if($floor->property->agent->user_id !== Auth::user()->id) {
            $this->dispatch("close-modal");
        } else {
            $this->size = $floor->size;
            $this->description = $floor->description;
            $this->previous_image = $floor->image;
        }
    }

    public function update() {
        $floor = PropertyFloor::find($this->id);
        if($floor) {
            $floor->size = $this->size;
            $floor->description = $this->description;
    
            //Hapus gambar terdahulu
            if(File::exists($floor->image)) {
                File::delete($floor->image);
            }
            
            if($this->image) {
                $uploadPath = 'uploads/floor/';
                $extension = $this->image->getClientOriginalExtension();
                $nameFile = "{$this->property->slug}-" . time() . ".{$extension}";
                $this->image->storeAs($uploadPath, $nameFile, "public_uploads");
                $floor->image = $uploadPath.$nameFile;
            }

            $floor->update();
            $this->reset("size, description, image");
            $this->dispatch("close-modal");
            return session()->flash("message", "Lantai berhasil ditambahkan");
        }


    }

    public function delete(int $floor_id) {
        $this->id = $floor_id;
        $this->dispatch("deletingFloor", "Anda yakin ingin menghapus lantai ini ?");
    }

    #[On("destroyFloor")]
    public function destroy() {
        $floor = PropertyFloor::find($this->id);
        if(File::exists($floor->image)) {
            File::delete($floor->image);
        }
        PropertyFloor::destroy($this->id);
        $this->dispatch("close-modal");
        return session()->flash("message", "Lantai berhasil dihapus");
    }

    public function render()
    {
    
        return view('livewire.admin.property-floor.index')
                ->with([
                    "property_floors" => $this->property_floors,
                    "property" => $this->property
                ]);
    }
}
