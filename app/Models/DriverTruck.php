<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DriverTruck extends Model
{
    protected $fillable = [
         'driver_id',
         'truck_id',
    ];
}
