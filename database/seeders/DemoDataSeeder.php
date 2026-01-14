<?php

namespace Database\Seeders;

use App\Models\Route;
use App\Models\Truck;
use App\Models\Driver;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DemoDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $trucks  = Truck::factory(5)->create();
        $drivers = Driver::factory(5)->create();

        foreach ($drivers as $driver) {
            Route::factory()->create([
                'driver_id' => $driver->id,
            ]);

        }

        foreach ($trucks as $truck) {
            Driver::factory()->create([
                'truck_id' => $truck->id,
            ]);
}
    }
}
