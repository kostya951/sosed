<?php

namespace Tests\Feature\Api;

use App\Models\City;
use App\Models\Microregion;
use Database\Seeders\CitySeeder;
use Database\Seeders\CountrySeeder;
use Database\Seeders\MicroregionSeeder;
use Database\Seeders\RegionSeeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MicroregionControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_get_microregions_by_city(): void
    {
        $this->seed(CountrySeeder::class);
        $this->seed(RegionSeeder::class);
        $this->seed(CitySeeder::class);
        $this->seed(RoleSeeder::class);
        $this->seed(UserSeeder::class);
        $this->seed(MicroregionSeeder::class);

        $expected = Microregion::where('city_id',1)
                    ->where('publish',true)
                    ->select(['id','name'])
                    ->get();

        $expected = json_encode($expected);

        $response = $this->get(route('api.microregion', ['city' => 1]));

        $response->assertStatus(200);
        $this->assertEquals($expected, $response->getContent());
    }
}
