<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Test Product',
            'descripcion' => 'Test Description',
            'marca_id' => 1,
            'categoria_id' => 1,
            'precio' => 100,
            'stock' => 10,
            'UrlImage' => 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.pinterest.com%2Fpin%2F397000000000000000%',
            'estado' => 1,
        ]);

        Product::factory(20)->create();
    }
}
