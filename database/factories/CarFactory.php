<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'mark' => $this->faker->name('Peugeot'),
            'model' => $this->faker->randomElement([308, 208, 4008, 5008, 508, ]),
            'vin' => strtoupper($this->faker->bothify('?????????????????')),
            'car_mass' => $this->faker->randomElement([1200 , 950 , 1300 ]),
            'price' => $this->faker->randomElement([18540, 20500]),
            'pickup_code' => strtoupper($this->faker->bothify('???###')),
            'status' => $this->faker->randomElement(['available', 'in_service', 'out_of_service']),
            'notes' => $this->faker->sentence(),
            'company_id' => \App\Models\Company::factory(),
            'driver_id' => null,
        ];
    }
}
