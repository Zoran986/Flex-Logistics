<?php

namespace App\Models;

use App\Models\LoadingOrder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{

    use HasFactory;
     protected $fillable = [
        'name', 
        'address', 
        'phone_number', 
        'email', 
        'address', 
        'city', 
        'tax_id', 
        'country',
        'postal_code'
    ];
    public function drivers()
{
    return $this->belongsToMany(Driver::class);
}

    public function routes()
    {
        return $this->hasMany(Route::class);
    }

    public function cars()
    {
        return $this->hasMany(Car::class);
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    public function loadingOrder()
    {
        return $this->hasMany(LoadingOrder::class);
    }

    public function guarantee()
    {
        return $this->hasMany(Guarantee::class);
    }
}
