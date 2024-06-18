<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DiscountCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DiscountCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DiscountCategory::factory()->count(10)->create();

        $discountCategories = [
            [
                'name' => 'Early Bird',
                'description' => 'Get a discount for booking early.',
                'discount_percentage' => 10.00,
                'condition' => 'Book tickets at least 7 days in advance.',
            ],
            [
                'name' => 'Student Discount',
                'description' => 'Discount for students with valid ID.',
                'discount_percentage' => 15.00,
                'condition' => 'Present valid student ID at the counter.',
            ],
            [
                'name' => 'Family Pack',
                'description' => 'Discount for families buying multiple tickets.',
                'discount_percentage' => 20.00,
                'condition' => 'Buy 4 or more tickets in a single transaction.',
            ],
        ];

        // Popolamento della tabella 
        foreach ($discountCategories as $category) {
            DiscountCategory::create($category);
        }
    }
}
