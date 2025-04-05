<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class MicroregionFactory extends Factory
{

    public function definition(): array
    {
        return [
            'name' => fake()->text(10),
        ];
    }

    public function published(){
        return $this->state(function($attributes){
            return [
                'publish' => true,
            ];
        });
    }
}
