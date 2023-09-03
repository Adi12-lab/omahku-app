<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Property;
use App\Models\Feature;
use App\Models\PropertyFeature;

use App\Http\Requests\PropertyFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view("")
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize("create", Property::class);
        $categories = Category::all(); 
        $provinces = DB::table('tb_ro_provinces')->get();
        $features = Feature::all();
        return view("admin.property.create", compact("categories", "provinces", "features"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertyFormRequest $request)
    {
        //simpan didalam database
        $property = new Property;
        $property->agent_id = Auth::user()->id;
        $property->name = $request->name;
        $property->slug = $request->slug;
        $property->category_id = $request->category_id;
        $property->for = $request->for === 'on' ? 1 : 0;
        $property->status = $request->status === "on" ? 1 : 0;
        $property->isFeatured = $request->isFeatured === "on" ? 1 : 0;
        $property->size = $request->size;
        $property->description = $request->description;
        $property->bedrooms = $request->bedrooms;
        $property->bathrooms = $request->bathrooms;
        $property->rooms = $request->rooms;
        $property->province_id = $request->province_id;
        $property->city_id = $request->city_id;
        $property->subdistrict_id = $request->subdistrict_id;
        $property->latitude = $request->latitude;
        $property->longitude = $request->longitude;
        $property->year_built = $request->year_built;
        $property->price = $request->price;
        $property->save();

        if($request->hasFile("images")) {
            $uploadPath = "uploads/property/";

            $i = 1;
            foreach($request->file("images") as $imageFile) {
                $extension = $imageFile->getClientOriginalExtension();
                $filename = $property->slug."-".time().$i++.".".$extension;
                $imageFile->move($uploadPath, $filename);
                $finalImagePathName = $uploadPath.$filename;

                $property->propertyImages()->create([
                    "property_id" => $property->id,
                    "image" =>$finalImagePathName,
                ]);
            }
        }

        if($request->features) {
            foreach( $request->features as $feature) {
                PropertyFeature::create([
                    "property_id" => $property->id,
                    "feature_id" => $feature
                ]);
            }
        }

        return redirect()->back()->with("message", "Property berhasil ditambahkan");
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Property $property)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Property $property)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        //
    }
}
