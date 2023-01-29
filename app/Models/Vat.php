<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vat extends Model
{
    protected $fillable = [
        "state_id",
        "number",
        "is_valid",
    ];

    protected $casts = [
        "is_valid" => "bool",
    ];

    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class);
    }
}
