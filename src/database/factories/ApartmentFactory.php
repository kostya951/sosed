<?php

namespace Database\Factories;

use App\Models\Street;
use Illuminate\Database\Eloquent\Factories\Factory;

class ApartmentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'dom' => fake()->numberBetween(1,100),
        ];
    }

    public function published(){
        return $this->state(function($attributes){
            return [
                'publish' => true
            ];
        });
    }
}
