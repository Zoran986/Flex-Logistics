<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TruckLocation extends Model
{
    protected $fillable = [
        'truck_id',
        'latitude',
        'longitude',
        'speed',
        'recorded_at',
    ];

    protected $casts = [
        'recorded_at' => 'datetime',
    ];

    public function truck()
    {
        return $this->belongsTo(Truck::class);
    }
}
