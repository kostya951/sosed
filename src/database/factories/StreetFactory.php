<?php

namespace Database\Factories;

use App\Models\Microregion;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class StreetFactory extends Factory
{

    public function definition(): array
    {
        return [
            'name' => fake()->unique()->streetName(),
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
