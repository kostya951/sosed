<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleCategoryFactory extends Factory
{

    public function definition(): array
    {
        return [
            'title' => fake()->text(20)
        ];
    }
}
