<?php

namespace Database\Seeders;

use App\Models\Microregion;
use App\Models\Street;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class StreetSeeder extends Seeder
{
    public function run(): void
    {
        Street::factory()
        ->sequence(function(Sequence $sequence){
            return [
                'publish_user_id'=> User::all()->random()->id,
                'microregion_id'=>Microregion::all()->random()->id
            ];
        })
        ->published()
        ->count(500)
        ->create();
    }
}
