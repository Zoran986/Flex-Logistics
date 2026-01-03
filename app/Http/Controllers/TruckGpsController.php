<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TruckGpsController extends Controller
{
     public function updateTruckLocation($truckId)
    {
        $response = Http::get("https://gps-api.example.com/trucks/{$truckId}/location");

        if ($response->ok()) {
            $data = $response->json();
            \App\Models\TruckLocation::create([
                'truck_id' => $truckId,
                'latitude' => $data['latitude'],
                'longitude' => $data['longitude'],
                'speed' => $data['speed'] ?? null,
                'recorded_at' => $data['timestamp'],
            ]);
        }

        return response()->json(['status' => 'ok']);
    }   
}
