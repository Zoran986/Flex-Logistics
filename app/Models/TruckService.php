<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TruckService extends Model
{
    protected $fillable = [
        'shop_name',
        'service_date',
        'shop_invoice',
        'service_type',
        'service_date',
        'mileage',
        'notes',
        'status',
        'truck_id',
        'price'
    ];

     public function truck()
    {
        return $this->belongsTo(Truck::class);
    }
}
