<?php

namespace Database\Seeders;

use App\Models\marca;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MarcaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        marca::create([
            'Type_marca' => 'Test Marca',
        ]);

        marca::factory(20)->create();
    }
}
