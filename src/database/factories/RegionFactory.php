<?php

namespace Database\Factories;

use App\Models\Country;
use App\Models\Region;
use Illuminate\Database\Eloquent\Factories\Factory;

class RegionFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->text(128),
        ];
    }

    public function configure()
    {
        return $this->afterMaking(function(Region $region){
            $region->country_id = Country::all()->random()->id;
        });
    }
}
