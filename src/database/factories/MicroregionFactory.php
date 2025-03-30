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
            'slug' => fake()->text(255),
            'name' => fake()->text(191),
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
