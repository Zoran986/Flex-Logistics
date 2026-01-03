<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Invoice extends Model
{
    protected $fillable = [
        'invoice_number',
        'amount',
        'date_issued',
        'date_payment',
        'cmr',
        'paid',
        'company_id',
        'driver_id',
        'route_id',
    ];

    protected $casts = [
        'date_issued'  => 'date',
        'date_payment' => 'date',
    ];
    // EACH INVOICE HAS MANY CARS
    public function cars()
    {
        return $this->hasMany(Car::class, 'invoice_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    public function route()
    {
        return $this->belongsTo(Route::class);
    }

    // Auto increment invoice number
    protected static function booted()
    {
        static::creating(function ($invoice) {
        $year = now()->year;

        // земи го последниот број за тековната година
        $last = Invoice::whereYear('created_at', $year)->max('invoice_number');

        $invoice->invoice_number = $last ? $last + 1 : 1;
    });
    }

    // COUNT CARS
    public function carsCount(): int
    {
        return $this->cars()->count();
    }

    public function totalAmount(): float
    {
        return floatval($this->amount) * $this->carsCount();
    }

    protected function formattedNumber(): Attribute
    {
        return new Attribute(
            // Accessors must be defined in the 'get' closure
            get: fn ($value, $attributes) =>  $attributes['invoice_number'] . '-' . date('Y') 
        );
    }
    
}
