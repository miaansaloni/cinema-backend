<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Hall;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Seat>
 */
class SeatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'hall_id' => Hall::factory(), // Crea una nuova hall o fornisci un ID esistente
            'row' => $this->faker->regexify('[A-Z]'),
            'seat_number' => $this->faker->numberBetween(1, 20),
            'is_available' => $this->faker->boolean(80), // 80% di probabilità che il posto sia disponibile
        ];
    }
}
