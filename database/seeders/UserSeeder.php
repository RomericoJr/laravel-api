<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Test User',
            'email' => 'tesa@test.com',
            'password' => bcrypt('12345678'),
            'rol_id'=>1,
        ])->assignRole('Admin');

        User::factory(20)->create();
    }
}
