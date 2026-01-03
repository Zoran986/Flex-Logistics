<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DriverController;

Route::get('/driver', [DriverController::class, 'show'])->name('driver.show');