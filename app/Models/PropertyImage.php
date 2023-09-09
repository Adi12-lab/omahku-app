<?php

namespace App\Models;

use App\Models\Property;

use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyImage extends Model
{
    use HasFactory;

    protected $table = "property_images";

    protected $guarded = ["id"];

    public function property() {
        return $this->belongsTo(Property::class, "property_id", "id");
    }

    protected static function booted(): void
    {
        static::deleting(function (PropertyImage $property_image) {
            if(File::exists($property_image->image)) {
                File::delete($property_image->image);
            }
        });
    }
}
