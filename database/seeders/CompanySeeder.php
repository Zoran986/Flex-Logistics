<?php

namespace Database\Seeders;

use App\Models\Car;
use DB;
use App\Models\Company;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    
    public function run(): void
    {
        Company::factory()
        ->has(Car::factory()->count(10), 'cars')
        ->count(10)
        ->create();
    }
}
