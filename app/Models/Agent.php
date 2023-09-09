<?php

namespace App\Models;

use App\Models\User;
use App\Models\Property;

use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Agent extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class, "user_id", "id");
    }
    public function properties() {
        return $this->hasMany(Property::class, "agent_id", "id");
    }
    protected static function booted(): void
    {
        static::deleting(function (Agent $agent) {
            if(File::exists($agent->image)) {
                File::delete($agent->image);
            }
        });
    }
}
