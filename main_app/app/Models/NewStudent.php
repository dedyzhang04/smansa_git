<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewStudent extends Model
{
    protected $guarded = [];

    protected $casts = [
        'birth_date' => 'date',
        'uploaded_at' => 'datetime',
    ];
}
