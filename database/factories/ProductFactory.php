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
    public function definition(): array
    {
        return [
            'category_id' => rand(1, 5),
            'name' => fake()->word(),
            'image' => 'image.png',
            'short_content' => fake()->sentence(3),
            'description' => fake()->paragraph(),
        ];
    }
}
