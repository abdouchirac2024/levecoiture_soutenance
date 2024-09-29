<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'first_name',
        'birth_date',
        'phone_number',
        'id_card_number',
        'id_card_front',
        'id_card_back',
        'driver_license_number',
        'driver_license_front',
        'driver_license_back',
        'vehicle_registration',
        'vehicle_photo',
        'vehicle_brand',
        'is_approved',
        'role_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'birth_date' => 'date',
        'is_approved' => 'boolean',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function isAdmin()
    {
        return $this->role->title === 'admin';
    }

    public function isDriver()
    {
        return $this->role->title === 'driver';
    }

    public function isClient()
    {
        return $this->role->title === 'client';
    }

    public function rides()
    {
        return $this->hasMany(Ride::class, 'driver_id');
    }

    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->name}";
    }
}