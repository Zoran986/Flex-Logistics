<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Route extends Model
{

    use HasFactory;
    protected $fillable = [
        'company_id', 
        'driver_id', 
        'destination', 
        'cash', 
        'tour_payment',
        'travel_order', 
        'bank_amount', 
        'visa' , 
        'paid',
        'balance', 
        'date_issued'        
    ];
     public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    protected static function booted()
    {
         static::creating(function ($route) {
        $year = now()->year;

        // Find the last travel_order for the current year
        $last = Route::whereYear('created_at', $year)->max('travel_order');

        $route->travel_order = $last ? $last + 1 : 1;
    });

    }

    protected function casts(): array
    {
        return [
            'status' => 'boolean',
        ];
    }


}
