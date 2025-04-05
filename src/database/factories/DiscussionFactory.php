<?php

namespace Database\Factories;

use App\Models\Apartment;
use App\Models\ApartmentUser;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Discussion>
 */
class DiscussionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->text(20),
            'body' => fake()->text(500),
            'see' =>fake()->numberBetween(0,10000),
        ];
    }
}
