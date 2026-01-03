<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{

    use HasFactory;

    protected $fillable = [
        'company_id', 
        'model', 
        'vin',
        'pickup_location',
        'pickup_code', 
        'car_mass',
        'mark',
        'price',
        'status', 
        'notes', 
        'driver_id', 
   
    ];
     public function company()      
    {
        return $this->belongsTo(Company::class,);
    }

   public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

     public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    public function loadingOrder()
    {
        return $this->belongsTo(LoadingOrder::class);
    }

    public function guarantee()
    {
        return $this->belongsTo(Guarantee::class);
    }

    
}
