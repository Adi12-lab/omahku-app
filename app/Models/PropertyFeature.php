<?php

namespace App\Models;

use App\Models\Feature;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PropertyFeature extends Model
{
    use HasFactory;

    protected $table = 'property_features';

    protected $guarded = ["id"];
    public $timestamps = false;

    public function feature(): BelongsTo {
        return $this->belongsTo(Feature::class, "feature_id", "id");
    }
}
