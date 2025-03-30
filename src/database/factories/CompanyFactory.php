<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{

    public function definition(): array
    {
        return [
            'name' => fake()->company(),
            'description' => fake()->text(50),
            'director' => fake()->name()
        ];
    }
}
