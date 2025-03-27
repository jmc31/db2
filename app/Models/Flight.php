<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'phone', 'age',
        'departure', 'destination', 'airline',
        'trip_type', 'class', 'departure_date',
        'departure_time', 'return_date'
    ];
}

