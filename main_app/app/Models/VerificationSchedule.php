<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VerificationSchedule extends Model
{
    protected $fillable = [
        'start_queue',
        'end_queue',
        'date',
        'time',
        'location',
    ];

    protected $casts = [
        'date' => 'date',
    ];
}
