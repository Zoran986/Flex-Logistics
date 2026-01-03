<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Driver;
use App\Models\Company;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
{
    $cars = Car::all()->chunk(200);
    $driversCount = Driver::count();
    $companiesCount = Company::count();

    return view('home', compact('cars', 'driversCount', 'companiesCount'));
}
}
