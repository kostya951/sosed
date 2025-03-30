<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Region;
use Illuminate\Database\Eloquent\Factories\Factory;

class CityFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->city(),
        ];
    }

    public function published(){
         return $this->state(function($attributes){
            return [
                'publish' => true,
            ];
        });
    }

    public function configure(){
        return $this->afterMaking(function(City $city){
            $city->region_id = Region::all()->random()->id;
        });
    }
}
