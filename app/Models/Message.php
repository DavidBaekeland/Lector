<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'message',
        'user_id',
        'chat_id',
    ];

    /** Attibutes */
    public function getCreatedTimeAttribute()
    {
        return $this->created_at->format('H:i');
    }

    /** Relationships */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
