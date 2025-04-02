<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected static ?string $password;

    public function definition(): array
    {
        return [
            'name' => fake()->unique()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
            'role_id' => 1
        ];
    }

    public function unverified(): static
    {
        return $this->state(function($attributes){
            return [
                'email_verified_at' => null,
            ];
        });
    }

    public function blocked(): static
    {
        return $this->state(function ($attributes){
            return [
                'block_at' => now()
            ];
        });
    }

    public function deleted(): static
    {
        return $this->state(function ($attributes){
            return [
                'deleted_at' => now()
            ];
        });
    }

    public function isAdmin(): static
    {
        return $this->state(function ($attributes){
            return [
                'role_id' => 2
            ];
        });
    }
}
