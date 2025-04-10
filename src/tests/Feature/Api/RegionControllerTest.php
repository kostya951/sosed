<?php

namespace Tests\Feature\Api;

use App\Models\Country;
use App\Models\Region;
use Database\Seeders\CountrySeeder;
use Database\Seeders\RegionSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use function json_encode;
use function var_dump;

class RegionControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_get_regions_by_country(): void
    {
        $this->seed(CountrySeeder::class);
        $this->seed(RegionSeeder::class);
        $country = Country::where('id',1)->first();

        $regions = Region::where('country_id',$country->id)->select(['id','name'])->get()->all();
        $expected =json_encode($regions);

        $response = $this->get(route('api.region',['country'=>$country->id]));

        $response->assertStatus(200);
        $actual = $response->getContent();
        $this->assertEquals($expected, $actual);
    }
}
