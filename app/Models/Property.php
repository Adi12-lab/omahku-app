<?php

namespace App\Models;

use App\Models\Category;
use App\Models\PropertyImage;
use App\Models\PropertyFloor;
use App\Models\PropertyFeature;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Property extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    public function category():BelongsTo {
        return $this->belongsTo(Category::class, "category_id", "id");
    }

    public function propertyImages():HasMany {
        return $this->hasMany(PropertyImage::class, "property_id", "id");
    }

    public function propertyFloors():HasMany {
        return $this->hasMany(PropertyFLoor::class, "property_id", "id");
        
    }
    public function propertyFeatures():HasMany {
        return $this->hasMany(PropertyFeature::class, "property_id", "id");
        
    }
    
    public function agent():BelongsTo {
        return $this->belongsTo(Agent::class, "agent_id", "id");
    }

    public function location(): BelongsTo {
        return $this->belongsTo(Location::class, "subdistrict_id", "subdistrict_id");
    }


    public function getRouteKeyName(): string
    {
        return 'slug';
    }

}
