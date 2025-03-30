<?php

namespace Database\Factories;

use App\Models\AdCategory;
use App\Models\Apartment;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => fake()->unique()->sentence(),
            'price' => fake()->randomFloat(2,0,100000),
        ];
    }
}
