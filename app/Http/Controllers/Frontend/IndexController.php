<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Property;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index() {

        $featuredProperties = Property::with(["propertyImages", "category", "agent", "location"])
                                    ->where("isFeatured", 1)
                                    ->limit(15)->get();

        $recentProperties = Property::latest()
                                    ->with(["propertyImages", "category", "agent", "location"])
                                    ->limit(13)
                                    ->get();
        $categories = Category::all();
        return view("frontend.index", compact("featuredProperties", "recentProperties", "categories")); 
    }
}
