<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Truck>
 */
class TruckFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'plate_number' => strtoupper($this->faker->bothify('SK-####-AB')),
            'model'        => $this->faker->randomElement(['MAN', 'Volvo', 'Scania']),
            'capacity'     => $this->faker->numberBetween(5000, 20000),
            'status'       => $this->faker->randomElement(['active', 'inactive']),
            'expire_date'  => $this->faker->date('now'),
            'certificate_date' => $this->faker->date( 'now'),
            'vin'          => strtoupper($this->faker->bothify('?????????????????')),
        ];
    }
}
