<?php

namespace App\Models;

use App\Models\Category;
use App\Models\PropertyImage;

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

    public function agent():BelongsTo {
        return $this->belongsTo(Agent::class, "agent_id", "id");
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

}
