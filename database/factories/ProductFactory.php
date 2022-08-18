<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'desc' => $this->faker->paragraph(),
            'price' => $this->faker->randomNumber(2),
            'sale_price' => $this->faker->randomNumber(2),
            'category_id' => $this->faker->randomNumber(1),
        ];
    }
}
