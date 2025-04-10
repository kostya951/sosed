<?php

namespace Tests\Feature\Api;

use App\Models\Country;
use Database\Seeders\CountrySeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CountryControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_basic_route(): void
    {
        $response = $this->get(route('api.country'));
        $response->assertStatus(200);
    }

    public function test_get_all_countries(){
        $this->seed(CountrySeeder::class);
        $expected = Country::all(['id','name'])->all();
        $expected = json_encode($expected);

        $response = $this->get(route('api.country'));

        $response->assertStatus(200);
        $actual = $response->getOriginalContent();
        $this->assertEquals($expected,$actual);
    }
}
