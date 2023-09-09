<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Property;
use App\Models\Feature;
use App\Models\PropertyFeature;
use App\Models\PropertyImage;
use App\Http\Requests\PropertyFormRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        if(Auth::user()->role_as === 1 && Auth::user()->agent) {
            $properties = Property::with(["agent", "propertyImages", "category"])->where("agent_id", Auth::user()->agent->id)->get();
        }

        elseif(Auth::user()->role_as === 2) {
            $properties = Property::with(["agent", "propertyImages", "category"])->get();
        }
        
        else {
            return to_route("dashboard.admin");
        }
        return view("admin.property.index", compact("properties"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize("create", Property::class);
        $categories = Category::all(); 
        $subdistricts = DB::table('tb_ro_subdistricts')->get();
        $features = Feature::where("status", 1)->get();
        return view("admin.property.create", compact("categories", "subdistricts", "features"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertyFormRequest $request)
    {
        //simpan didalam database
        $property = new Property;
        $property->agent_id = Auth::user()->agent->id;
        $property->name = $request->name;
        $property->slug = Str::slug($request->slug);
        $property->category_id = $request->category_id;
        $property->for = $request->for === 'on' ? 1 : 0;
        $property->status = $request->status === "on" ? 1 : 0;
        $property->isFeatured = $request->isFeatured === "on" ? 1 : 0;
        $property->size = $request->size;
        $property->description = $request->description;
        $property->bedrooms = $request->bedrooms;
        $property->bathrooms = $request->bathrooms;
        $property->rooms = $request->rooms;
        $property->subdistrict_id = $request->subdistrict_id;
        $property->address =  $request->address;
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
        $this->authorize("edit", Property::class);
        $categories = Category::all(); 
        $subdistricts = DB::table('tb_ro_subdistricts')->get();
        $features = Feature::where("status", 1)->get();
        $properties_features = PropertyFeature::where("property_id", $property->id)->get();

        $mergePropertiesFeatures = $features->map(function($feature) use ($properties_features) {
            $isSelected = $properties_features->contains(function ($propertyFeature) use ($feature) {
                return $propertyFeature["feature_id"] === $feature["id"];
            });
            return [
                "id" => $feature->id,
                "name" => $feature->name,
                "isSelected" => $isSelected
            ];
        });
        return view("admin.property.edit", compact("property", "categories", "subdistricts", "mergePropertiesFeatures"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PropertyFormRequest $request, Property $property)
    {
    
        $property->agent_id = Auth::user()->agent->id;
        $property->name = $request->name;
        $property->slug = Str::slug($request->slug);
        $property->category_id = $request->category_id;
        $property->for = $request->for === 'on' ? 1 : 0;
        $property->status = $request->status === "on" ? 1 : 0;
        $property->isFeatured = $request->isFeatured === "on" ? 1 : 0;
        $property->size = $request->size;
        $property->description = $request->description;
        $property->bedrooms = $request->bedrooms;
        $property->bathrooms = $request->bathrooms;
        $property->rooms = $request->rooms;
        $property->subdistrict_id = $request->subdistrict_id;
        $property->address =  $request->address;
        $property->latitude = $request->latitude;
        $property->longitude = $request->longitude;
        $property->year_built = $request->year_built;
        $property->price = $request->price;
        $property->update();
            
            // Hapus gambar
            // dd($request->previous_image"]);
            if(isset($request->previous_image)) {
                $deleteImages = PropertyImage::whereNotIn("id", $request->previous_image)->where("property_id", $property->id)->get();
                if(count($deleteImages) > 0) {//jika ada hasilnya
                    foreach($deleteImages as $deleteImage) {
                        if(File::exists($deleteImage->image)) {
                            File::delete($deleteImage->image);
                        }
                        PropertyImage::destroy($deleteImage->id);
                    }   
                } 
            } else {
                //ambil semua gambar dari database berdasarkan id,
                $fetchImages = PropertyImage::where("property_id", $property->id)->get();
                //cek gambar apakah ada
                foreach($fetchImages as $fetchImage) {
                    if(File::exists($fetchImage->image)) {
                        File::delete($fetchImage->image);
                    }
                }
                //setelah proses penghapusan file, hapus pada database
                PropertyImage::where("property_id", $property->id)->delete();
            }

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
        //Hapus feature yang tidak ada di request
        $previous_property_features = PropertyFeature::all();
        if($request->features) {
            PropertyFeature::whereNotIn("feature_id", $request->features)->where("property_id")->delete();
            $new_property_features = $previous_property_features->whereNotIn("feature_id",$request->features)->map(function($item) use ($property) {
                return [
                    "property_id" => $property->id,
                    "feature_id" => $item
                ];
            })->toArray();
            PropertyFeature::insert($new_property_features);

        } else {
            PropertyFeature::where("property_id", $property->id)->delete();
        }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        Property::destroy($property->id);
    }
}
