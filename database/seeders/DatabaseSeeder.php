<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\CompanySeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create();

        /* $this->call([
        TruckLocationSeeder::class,
        ]); 
        */

        $this->call(CompanySeeder::class);
        $this->call(DemoDataSeeder::class);
    }  
}
