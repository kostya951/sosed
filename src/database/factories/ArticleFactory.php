<?php

namespace Database\Factories;

use App\Models\ArticleCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{

    public function definition(): array
    {
        return [
            'title' => fake()->text(20),
            'body' => fake()->text(),
            'slug' => fake()->text(30),
            'description' => fake()->text(100),
            'category_id' => ArticleCategory::all()->random()->id,
            'publish_user_id' => User::all()->random()->id
        ];
    }
}
