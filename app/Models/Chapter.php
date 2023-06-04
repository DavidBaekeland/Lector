<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Chapter extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'subject_id'
    ];

    /** Relationships */
    public function documents(): HasMany
    {
        return $this->hasMany(Document::class);
    }
}
