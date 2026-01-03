<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Driver; // Assuming you have a Driver model

class DriverController extends Controller
{
    public function show($id)
    {
        $driver = Driver::findOrFail($id); // Retrieve driver by ID
        return view('driver', ['driver' => $driver]);
    }
}