<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Truck extends Model
{

        protected $fillable = [

        'plate_number',
        'expire_date',
        'model',
        'certificate_date',
        'vin',
        'pp_service',
        'capacity',
        'status'
    ];

    protected $casts = [
    'expire_date' => 'date', // or 'datetime'
];
    public function drivers()
    {
        return $this->hasMany(Driver::class);
    }

    public function services()
    {
        return $this->hasMany(TruckService::class);
    }

    protected static function getNavigationBadge(): ?string
    {
        return (string) Truck::whereBetween('expire_date', [
            now()->startOfDay(),
            now()->addDays(7)->endOfMonth(),
        ])->count();
    }

    protected static function getNavigationBadgeColor(): ?string
    {
        return 'danger'; // red badge
    }


    public function latestLocation()
    {
        return $this->hasOne(TruckLocation::class)
            ->orderByDesc('recorded_at'); // ова е безбедно за SQLite
    }

    public function locations()
    {
        return $this->hasMany(TruckLocation::class);
    }
}
