<?php

namespace App\Livewire\Admin\Category;

use Illuminate\Support\Str;

use App\Models\Category;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Rule;
use Livewire\Attributes\On;
use Livewire\WithFileUploads;
use Livewire\Component;

 
class Index extends Component
{
    
    use WithFileUploads;

    #[Locked]
    public $category_id;

    #[Rule("required|string|min:3")]
    public $name;
    
    #[Rule("required|string|unique:categories,slug")]
    public $slug;
    
    #[Rule("required")]
    public $status = true;

    #[Rule('required|image|max:1024')]
    public $image;

    public function save() {
        $this->validate();
        if(!Category::firstWhere("name", $this->name)) {

            $category = new Category;
            $category->name = $this->name;
            $category->slug = Str::slug($this->slug);
            $category->status = $this->status ? 1 : 0;
            $uploadPath = 'uploads/category/';

            $extension = $this->image->getClientOriginalExtension();
            $nameFile = Str::slug($this->slug)."-" . time() . ".{$extension}";
            $this->image->storeAs($uploadPath, $nameFile, "public_uploads");
            $category->image = $uploadPath.$nameFile;

            $category->save();
            
            $this->reset("name", "status");
            $this->dispatch("close-modal");
            return session()->flash("message", "Kategori berhasil ditambahkan");
        }
    }

    public function edit(int $category_id) {
        $this->category_id = $category_id;
        $category = Category::findOrFail($category_id);
        $this->name = $category->name;
        $this->status = $category->status === 1 ? true : false;
    }

    public function update() {
        $this->validate();
        Category::findOrFail($this->category_id)->update([
            "name" => $this->name,
            "status" => $this->status ? 1 : 0
        ]);
        session()->flash("message", "Kategori $this->name berhasil diedit");
        $this->reset("name", "status");
        $this->dispatch("close-modal");
    }

    public function delete(int $category_id) {
        $this->category_id = $category_id;
        $this->dispatch("deletetingCategory", data: [
            "name" => Category::find($this->category_id)->name
        ]);
    }

    #[On("destroyCategory")]
    public function destroy() {
        Category::find($this->category_id)->delete();
        session()->flash("message", "Kategori berhasil dihapus");
    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.category.index')
                ->with([
                    "categories" => $categories
                ])
                ->extends("layouts.admin")
                ->section("content");
    }
}
