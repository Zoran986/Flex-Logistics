<?php

namespace Database\Factories;

use App\Models\Truck;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Driver>
 */
class DriverFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'truck_id'     => Truck::factory(),
            'name'          => $this->faker->name(),
            'surname'       => $this->faker->lastName(),
            'email'         => $this->faker->unique()->safeEmail(),
            'phone_number'  => $this->faker->phoneNumber(),
            'address'       => $this->faker->address(),
            'city'          => $this->faker->city(),
            'postal_code'   => $this->faker->postcode(),
            'passport_number'=> strtoupper($this->faker->bothify('P########')),
            'passport_date' => $this->faker->date(),
            'first_working_day' => $this->faker->date(),
            'status'        => $this->faker->randomElement(['active', 'inactive']),
        ];
    }
}
