<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Subject extends Model
{
    use HasFactory;

    /** Relationships */
    public function appointments(): HasMany
    {
        return $this->hasMany(Appointment::class);
    }

    public function announcements(): HasMany
    {
        return $this->hasMany(Announcement::class);
    }

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }

    public function pastTasks(): HasMany
    {
        return $this->hasMany(Task::class)
            ->where("deadline", "<", now());
    }

    public function chapters(): HasMany
    {
        return $this->hasMany(Chapter::class);
    }
}
