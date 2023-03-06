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
        'name' => fake()->sentence(2),
        'categoria' =>fake()->sentence(2),
        'marca'=> fake()->sentence(2),
        'descripcion'=>fake()->paragraph(),
        'precio'=>fake()->randomNumber(),
        'stock'=>fake()->randomNumber(),
        'UrlImage'=>fake()->url(),
        'estado'=>1,
        ];
    }
}
