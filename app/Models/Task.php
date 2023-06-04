<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'deadline',
        'points',
        'subject_id',
    ];

    /** Relationships */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class)
            ->withPivot('points', 'file_name')
            ->withTimestamps();
    }

    /** Relationships */
    public function user($user): BelongsToMany
    {
        return $this->belongsToMany(User::class)
            ->withPivot('points', 'file_name')
            ->withTimestamps()
            ->where('user_id', '=', $user);
    }


    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }


}
