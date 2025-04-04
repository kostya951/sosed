<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->count(20)->create();
        User::factory()->unverified()->count(5)->create();
        User::factory()->blocked()->count(1)->create();
        User::factory()->deleted()->count(5)->create();
        User::factory()->isAdmin()->count(1)->create();
    }
}
