<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guarantee extends Model
{
    protected $fillable = [
        'firm',
        'place',
        'custom_destination',
        'carrier',
        'vehicle_registration',
        'description_of_goods',
        'company_id'
    ];

     public function company()
    {
        return $this->belongsTo(Company::class);
    }

     public function cars()
    {
        return $this->hasMany(Car::class);
    }

    
}
