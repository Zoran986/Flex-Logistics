<?php

namespace App\Models;

use App\Models\Driver;
use Illuminate\Database\Eloquent\Model;

class LoadingOrder extends Model
{

    protected $fillable = [
        'loading_order_number',
        'driver',
        'truck_number',
        'destination',
        'date_of_loading',
        'place_of_loading',
        'company_id',
        'car_id',
        'export_customs',
        'import_customs',
        'date_of_unloading',
        'place_of_unloading',
        'important'
    ];
     public function cars()
    {
        return $this->hasMany(Car::class);
    }


    
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
