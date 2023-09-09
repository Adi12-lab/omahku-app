<?php

namespace App\Models;

use App\Models\Property;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PropertyFloor extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    public function property(): BelongsTo {
        return $this->belongsTo(Property::class, "property_id", "id");
    }
}
