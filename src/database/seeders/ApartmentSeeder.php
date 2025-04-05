<?php

namespace Database\Seeders;

use App\Models\Apartment;
use App\Models\Street;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class ApartmentSeeder extends Seeder
{
    public function run(): void
    {
        Apartment::factory()
                    ->sequence(function (Sequence $sequence){
                     return [
                         'street_id' => Street::all()->random()->id,
                     ];
                    })
                    ->published()
                    ->count(1000)
                    ->create();
    }
}
