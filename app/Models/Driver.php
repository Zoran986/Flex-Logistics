<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $fillable = [
         'name',
         'surname',
         'address',
         'city',
         'postal_code',
         'country',
         'passport_number',
         'passport_date',
         'email',
         'first_working_day',
         'last_working_day',
         'status', 
         'phone_number',
         'truck_id'
    ];

    protected $casts = [
        'registration_date' => 'date',
        'reminder_sent_at' => 'datetime',
        'registration_reminder_sent' => 'boolean',
    ];
    
    public function companies()
    {
        return $this->belongsToMany(Company::class);
    }

    public function routes()
    {
        return $this->hasMany(Route::class);
    }

    public function cars()
    {
        return $this->hasMany(Car::class);
    }
    
    public function truck()    
    {
        return $this->belongsTo(Truck::class);
    }


}
