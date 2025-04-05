<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Microregion;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class MicroregionSeeder extends Seeder
{
    public function run(): void
    {
        Microregion::factory()
            ->sequence(function (Sequence $sequence){
                return [
                    'publish_user_id' => User::all()->random()->id,
                    'city_id' => City::all()->random()->id,
                ];
            })
            ->published()
            ->count(100)
            ->create();
    }
}
