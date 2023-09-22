<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DasboardController extends Controller
{
    public function index() {
        //Kategori Count
        $categories = Category::select("name")->withCount("properties")->get();
        $categoryPropertyCounts = $categories->pluck("properties_count")->toArray();


        //Favorite Kategori Count
        $categoryFavorite = DB::table('categories')
                            ->select('categories.id',  'categories.name', DB::raw('count(wishlists.id) as wishlist_count'))
                            ->join('properties', 'categories.id', '=', 'properties.category_id')
                            ->join('wishlists', 'properties.id', '=', 'wishlists.property_id')
                            ->groupBy('categories.id', 'categories.name')
                            ->get();
        $categoryFavoriteNames = $categoryFavorite->pluck("name")->toArray();
        $categoryFavoriteWishlistCount = $categoryFavorite->pluck("wishlist_count")->toArray();
        $totalFavorite = array_sum($categoryFavoriteWishlistCount);
        
        $categoryFavoritePercentages = array_map(function($value) use ($totalFavorite) {
            return (int) round(($value / $totalFavorite) * 100);
        }, $categoryFavoriteWishlistCount);

        $categoryFavoriteColors = [];
        for($i = 0; $i < count($categoryFavoriteNames); $i++) {
            $categoryFavoriteColors[] = generateRandomHexColor();
        }

        //Jumlah Agen
        $agentsCount = DB::table("agents")->select(DB::raw("count(*) as total_agent"))->first()->total_agent;

        $usersCount = DB::table("users")->select(DB::raw("count(*) as total_user"))->first()->total_user;
        return view("admin.dasboard", [
            "agentsCount" => $agentsCount,
            "usersCount" => $usersCount,
            "categories" => $categories->pluck("name")->toArray(),
            "categoryPropertyCounts" => $categoryPropertyCounts,
            "categoryFavoriteNames" => $categoryFavoriteNames,
            "categoryFavoritePercentages" => $categoryFavoritePercentages,
            "categoryFavoriteColors" => $categoryFavoriteColors
        ]);
    }
}
