<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chat extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
    ];

    /** Attibutes */
    public function getNameAttribute($name)
    {
        if ($name) {
            return $name;
        }

        $name = "";

        foreach($this->users as $chatUser)
        {
            if($chatUser->id != auth()->user()->id)
            {
                if ($name == "")
                {
                    $name = "$chatUser->name";
                } else
                {
                    $name = "$name, $chatUser->name";
                }
            }
        }

        return $name;
    }

    /** Relationships */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function messages(): HasMany
    {
        return $this->hasMany(Message::class);
    }
}
