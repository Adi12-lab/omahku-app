<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryFormRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index() {
        return view("admin.category.index");
    }

    public function create() {
        return view("admin.category.create");
    }

    public function store(CategoryFormRequest $request) {
        $validatedData = $request->validated();
        $category = new Category;
        $category->name = $validatedData["name"];
        $category->status = $request->status == true ? "1" : "0";

        $category->save();

        return redirect("admin/category")->with("message", "Category Added Successfully");
    }

    public function edit(Category $category) {
        return view("admin.category.edit", compact("category"));
    }

    public function update(CategoryFormRequest $request, $category) {
        $validatedData = $request->validated();

        $category = Category::findOrFail($category);
        
        $category->name = $validatedData["name"];
        $category->status = $request->status == true ? "1" : "0";
        $category->update();

        return redirect("admin/category")->with("message", "Category Updated Successfully");

    }

}
