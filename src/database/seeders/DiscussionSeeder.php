<?php

namespace Database\Seeders;

use App\Models\Apartment;
use App\Models\Discussion;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class DiscussionSeeder extends Seeder
{
    public function run(): void
    {
        Discussion::factory()
                  ->sequence(function (Sequence $sequence){
                      $user = User::all()->random();
                      return [
                          'user_id' => $user->id,
                          'apartment_id' => $user->apartments->first()->id
                      ];
                  })
                    ->count(50)
                  ->create();
    }
}
