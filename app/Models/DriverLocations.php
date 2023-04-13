<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DriverLocations extends Model
{
    use HasFactory;

    protected $table = 'driver_location';

    protected $fillable = [
        'route_id',
        'lat',
        'lon',
        'origin',
        'destination',
        'trip_status',
        'vehicle_number'
    ];
}
