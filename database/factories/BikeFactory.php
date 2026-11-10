<?php

namespace Database\Factories;

use App\Models\Bike;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Bike>
 */
class BikeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'serial_number' => strtoupper($this->faker->unique()->bothify('BK-#####')),
            'model' => $this->faker->randomElement(['Urbana', 'Montaña', 'Eléctrica']),
            'price_per_hour' => $this->faker->randomFloat(2, 2, 15),
            'status' => $this->faker->randomElement(['available', 'available', 'available', 'maintenance']), 
        ];
    }
}
