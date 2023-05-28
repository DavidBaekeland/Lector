<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Date extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'date',
        'time',
        'appointment_id'
    ];


//    protected $fillable = [
//        'start_date',
//        'start_time',
//        'end_date',
//        'end_time',
//        'appointment_id'
//    ];

    /** Relationships */
    public function appointment(): BelongsTo
    {
        return $this->belongsTo(Appointment::class);
    }
}
