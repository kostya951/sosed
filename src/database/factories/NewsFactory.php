<?php

namespace Database\Factories;

use App\Models\Apartment;
use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class NewsFactory extends Factory
{

    public function definition(): array
    {
        return [
            'title' => fake()->title(),
            'body' => fake()->text(100),
            'apartment_id' => Apartment::all()->random()->id,
            'company_id' => Company::all()->random()->id,
        ];
    }

    public function watchAll(){
        return $this->state(function ($attributes){
            return [
                'watchAll' => true
            ];
        });
    }
}
