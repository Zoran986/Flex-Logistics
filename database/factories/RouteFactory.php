<?php

namespace Database\Factories;

use App\Models\Driver;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Route>
 */
class RouteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'driver_id'  => Driver::factory(),
            'destination' => $this->faker->city(),
            'date_issued'   => $this->faker->date(),
            'travel_order' => strtoupper($this->faker->bothify('TO-#####')),
            'tour_payment' => $this->faker->numberBetween(1000, 20000),
            'bank_amount' => $this->faker->numberBetween(500, 15000),
            'visa' => $this->faker->numberBetween(100, 5000),
            'cash' => $this->faker->numberBetween(100, 5000),
            'paid' => $this->faker->boolean('false'),
        ];
    }
}
