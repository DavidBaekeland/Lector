<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'location',
        'start_date',
        'end_date',
        'start_time',
        'end_time',
    ];

    /** Relationships */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    // Controleren -> in Date model
    public function dates(): HasMany
    {
        return $this->HasMany(Date::class);
    }
}
