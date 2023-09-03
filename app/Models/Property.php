<?php

namespace App\Models;

use App\Models\Category;
use App\Models\PropertyImage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    public function category() {
        return $this->belongsTo(Category::class, "category_id", "id");
    }

    public function propertyImages() {
        return $this->hasMany(PropertyImage::class, "property_id", "id");
    }

}
