<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Property;
use App\Models\Feature;
use App\Models\Location;

use App\Events\MessageDelivered;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class PropertyController extends Controller

        // "larger_than_size" => intval($request->get("size")),
        // "feature" => intval($request->get("feature"))
{
    public function index(Request $request) {

        if($request->isMethod("POST")) {
            $ranges = explode(";",$request->get("price_range")); 
            // dd($request);
            session([
                "category_id" => $request->get("category_id")  !== null ? intval($request->get("category_id")) : null,
                "for" => $request->get("for") !== null ? intval($request->get("for")) : null,
                "subdistrict_id" => $request->get("subdistrict_id")  !== null ? intval($request->get("subdistrict_id")) : null,
                "bedrooms" => $request->get("bedrooms") !== null ? intval($request->get("bedrooms")) : null,
                "bathrooms" => $request->get("bathrooms") !== null ? intval($request->get("bathrooms")) : null,
                "size" => $request->get("size") !== null ? intval($request->get("size")) : null,
                "rangeMinPrice" => intval($ranges[0]),
                "rangeMaxPrice" => intval($ranges[1]),
                "features" => $request->get("feature")
            ]);
        }

        
        $minPrice = Property::min('price');
        $maxPrice = Property::max("price");
        // Apply filters to the query
        $properties = Property::with(["agent", "category", "propertyImages", "location", 'propertyFloors']);
        $filters = ['category_id', 'for', 'subdistrict_id', 'bedrooms', 'bathrooms', 'size','price', 'features'];

        foreach ($filters as $filter) {
            if (session()->has($filter) && session($filter) !== null) {
                if($filter === 'size') {
                    $properties = $properties->where($filter, "<=", session($filter));
                } elseif($filter === 'bedrooms' || $filter === "bathrooms") {
                    if(session($filter) === 1000) {//1000 artinya kamar tidur atau mandi lebih dari 8
                        $properties = $properties->where($filter, ">=", 8);
                    } else {
                        $properties = $properties->where($filter, session($filter));
                    }
                } elseif($filter === 'price') {
                    if(session("rangeMinPrice") !== null && session("rangeMaxPrice") !== null) {
                        $properties = $properties->whereBetween("price", [session("rangeMinPrice"), session("rangeMaxPrice")]);
                    }
                } elseif($filter === 'features') {
                    if(session()->has($filter) && session($filter) !== null) {
                        $featureIds = session($filter);
                        // dd($featureIds);
                
                        foreach ($featureIds as $featureId) {
                            $properties->whereExists(function ($query) use ($featureId) {
                                $query->select(DB::raw(1))
                                    ->from('property_features')
                                    ->whereRaw('property_features.property_id = properties.id')
                                    ->where('property_features.feature_id', $featureId);
                            });
                        }
                    }
                }  else {
                    $properties = $properties->where($filter, session($filter));
                }
    
            } 
        }

        $searchParam = $request->get("search");
        if($searchParam !== null) {
            $properties =  $properties->where(function ($q) use($searchParam) {
                    $q->where('name', 'like', '%' . $searchParam . '%')
                        ->orWhereHas('agent', function ($q) use ($searchParam) {
                            $q->where('name', 'like', '%' . $searchParam . '%');
                        });
                });
        }
        
        $properties = $properties->inRandomOrder()->paginate(6);
        
        $categories = Category::withCount('properties as property_count')->get();
        $locations = Location::all();
        $features = Feature::all();
        // dd($properties);
        return view("frontend.properties", compact("properties","categories", "locations", "features", "minPrice", "maxPrice"));
    }

   
}
