<?php

namespace Database\Factories;

use App\Models\Reservation;
use App\Models\DiscountCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'reservation_id' => Reservation::factory(),
            'base_price' => $this->faker->randomFloat(2, 10, 100),
            'discount_id' => DiscountCategory::factory(),
            'final_price' => $this->faker->randomFloat(2, 5, 95),
            'purchase_date' => $this->faker->dateTimeBetween('-1 month', 'now'),
        ];
    }
}
