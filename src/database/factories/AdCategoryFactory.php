<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AdCategoryFactory extends Factory
{

    public function definition(): array
    {
        return [
            'slug' => fake()->unique()->text(255),
            'title'=>fake()->text(10),
        ];
    }
}
