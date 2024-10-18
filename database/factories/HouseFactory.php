<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\House>
 */
class HouseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'=> fake()->name(),
            'description'=> Str::random(100),
            'price'=> rand(10,10000),
            'total_area'=> rand(10,1000),
            'covered_area'=> rand(10,500),
            'rooms_number'=> rand(1,10),
        ];
    }
}
