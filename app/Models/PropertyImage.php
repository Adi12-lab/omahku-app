<?php

namespace App\Models;

use App\Models\Property;
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
}
