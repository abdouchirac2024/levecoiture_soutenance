<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ride extends Model
{
    use HasFactory;

    protected $fillable = [
        'driver_id',
        'departure',
        'destination',
        'departure_time',
        'available_seats',
        'price',
        'description',
        'phone_number',
    ];

    protected $casts = [
        'departure_time' => 'datetime',
    ];

    public function driver()
    {
        return $this->belongsTo(User::class, 'driver_id');
    }
}
