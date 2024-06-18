<?php

namespace Database\Factories;

use App\Models\Theater;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hall>
 */
class HallFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
    
        return [
            'name' => $this->faker->word(),
            'capacity' => $this->faker->numberBetween(50, 500),
            'theater_id' => Theater::query()->inRandomOrder()->value('id'), 
        ];
 
    }
}
