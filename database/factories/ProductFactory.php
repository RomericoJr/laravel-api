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
        'descripcion'=>fake()->paragraph(),
        'marca_id'=> fake()->randomNumber(1,20),
        'categoria_id' =>fake()->randomNumber(1,20),
        'precio'=>fake()->randomNumber(1, 50000),
        'stock'=>fake()->randomNumber(),
        // 'UrlImage'=>fake()->url(),
        'UrlImage'=>'https://http2.mlstatic.com/D_NQ_NP_827235-MLA45015614165_022021-V.jpg',
        'estado'=>1,
        ];
    }
}
