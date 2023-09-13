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
    public function index(Request $request)
    {   

        // Menentukan query awal berdasarkan peran pengguna
        if(Auth::user()->role_as === 1 && Auth::user()->agent) {
            $query = Property::with(["agent", "propertyImages", "category"])
                            ->where("agent_id", Auth::user()->agent->id);
        } elseif(Auth::user()->role_as === 2) {
            $query = Property::with(["agent", "propertyImages", "category"]);
        } else {
            return to_route("dashboard.admin");
        }

        // Jika ada query pencarian, tambahkan ke query awal
        if($request->has("q")) {
            $searchTerm = $request->q;

            // Mencari properti berdasarkan nama atau nama agen
            $query->where(function ($q) use ($searchTerm) {
                $q->where('name', 'like', '%' . $searchTerm . '%')
                ->orWhereHas('agent', function ($q) use ($searchTerm) {
                    $q->where('name', 'like', '%' . $searchTerm . '%');
                });
            });
            
            //dd($query); // Untuk debugging, hapus baris ini saat sudah selesai
        }
    
            // Melakukan paginasi hasil query dan mengirimnya ke view
             $properties = $query->paginate(6)->withQueryString();
    
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
        $property->map_iframe = $request->map_iframe;
        $property->street_iframe = $request->street_iframe;
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

        return to_route("property.index")->with("message", "Properti $property->name berhasil ditambahkan");
        
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

        $propertyId = $property->id;

        if($request->features) {
            // Menghapus feature yang tidak ada dalam request
            PropertyFeature::where('property_id', $propertyId)
                           ->whereNotIn('feature_id', $request->features)
                           ->delete();
        
            // Mendapatkan daftar feature yang belum ada dalam database
            $newFeatures = collect($request->features)->diff(
                PropertyFeature::where('property_id', $propertyId)->pluck('feature_id')
            );
        
            // Menyiapkan data untuk ditambahkan ke database
            $newPropertyFeatures = $newFeatures->map(function ($featureId) use ($propertyId) {
                return [
                    'property_id' => $propertyId,
                    'feature_id' => $featureId,
                ];
            })->toArray();
        
            // Menambahkan feature baru ke database
            PropertyFeature::insert($newPropertyFeatures);
        } else {
             // Jika tidak ada feature dalam request, menghapus semua feature dari properti ini
             PropertyFeature::where("property_id", $propertyId)->delete();
        }

        return to_route("property.index")->with("message", "Properti $property->name berhasil diedit");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        Property::destroy($property->id);
    }
}
