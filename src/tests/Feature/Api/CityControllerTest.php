<?php

namespace Tests\Feature\Api;

use App\Models\City;
use Database\Seeders\CitySeeder;
use Database\Seeders\CountrySeeder;
use Database\Seeders\RegionSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CityControllerTest extends TestCase
{
    Use RefreshDatabase;

    public function test_get_cities_by_region(): void
    {
        $this->seed(CountrySeeder::class);
        $this->seed(RegionSeeder::class);
        $this->seed(CitySeeder::class);

        $expected = City::where('region_id', 1)
            ->where('publish',true)
            ->select('id','name')
            ->get()
            ->all();
        $expected = json_encode($expected);

        $response = $this->get(route('api.city',['region'=>1]));

        $response->assertStatus(200);
        $this->assertequals($expected, $response->getContent());
    }
}
