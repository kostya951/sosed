<?php

namespace Database\Seeders;

use App\Models\Apartment;
use App\Models\ApartmentUser;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class ApartmentUserSeeder extends Seeder
{
    public function run(): void
    {
        $count = User::all()->count();
        ApartmentUser::factory()
            ->sequence(function(Sequence $sequence){
                 $user =  User::find($sequence->index+1);
                 $apartment = Apartment::find($sequence->index+1);
                 return [
                     'apartment_id' => $apartment->id,
                     'user_id' => $user->id,
                 ];
            })
            ->count($count)
            ->create();
    }
}
