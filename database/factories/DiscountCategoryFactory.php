<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Discount_category>
 */
class DiscountCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->paragraph,
            'discount_percentage' => $this->faker->randomFloat(2, 0, 100),
            'condition' => $this->faker->randomElement(['age < 10', 'age > 65', 'student']),
        ];
    }
}
