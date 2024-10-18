<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\House;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $house = House::factory()->create();
        // $city = City::create(['name'=>'Villa Gral Belgrano']);

        return [
            'property_id' => $house->id,
            'type' => House::class,
            'city_id' => rand(1,3),
            'description' => $house->description,
            'light' => rand(0,1),
            'natural_gas' => rand(0,1),
            'phone' => rand(0,1),
            'water' => rand(0,1),
            'sewers' => rand(0,1),
            'internet' => rand(0,1),
            'asphalt' => rand(0,1),
        ];
    }
}
