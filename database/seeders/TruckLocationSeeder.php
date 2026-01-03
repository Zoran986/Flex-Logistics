<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Truck;
use App\Models\TruckLocation;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TruckLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            $trucks = Truck::all();

        if ($trucks->isEmpty()) {
            $this->command->warn('No trucks found.');
            return;
        }

        foreach ($trucks as $truck) {
            // Skopje area random coordinates
           foreach ($trucks as $truck) {
    $baseLat = fake()->latitude(41.95, 42.05);
    $baseLng = fake()->longitude(21.35, 21.55);

    for ($i = 0; $i < 10; $i++) {
        TruckLocation::create([
            'truck_id'   => $truck->id,
            'latitude'   => $baseLat + ($i * 0.001),
            'longitude'  => $baseLng + ($i * 0.001),
            'speed'      => fake()->numberBetween(20, 80),
            'recorded_at'=> now()->subMinutes(10 - $i),
        ]);
    }

    }
        }
    }
}

