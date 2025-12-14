<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    /** @use HasFactory<\Database\Factories\OutletFactory> */
    use HasFactory;

    protected $fillable = [
        'address',
        'city',
        'open_time',
        'close_time',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
