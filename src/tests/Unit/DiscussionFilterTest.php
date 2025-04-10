<?php

namespace Tests\Unit;


use App\Models\Discussion;
use Database\Seeders\CitySeeder;
use Database\Seeders\CountrySeeder;
use Database\Seeders\MicroregionSeeder;
use Database\Seeders\RegionSeeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Tests\TestCase;

class DiscussionFilterTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(CountrySeeder::class);
        $this->seed(RegionSeeder::class);
        $this->seed(CitySeeder::class);
        $this->seed(RoleSeeder::class);
        $this->seed(UserSeeder::class);
        $this->seed(MicroregionSeeder::class);
    }
    public function test_filter_with_country(): void
    {
        $expected = Discussion::query()
            ->select('discussions.*')
            ->join('apartments as ap', 'ap.id', '=', 'discussions.apartment_id')
            ->join('streets as st', 'st.id', '=', 'ap.street_id')
            ->join('microregions as mr', 'mr.id', '=', 'st.microregion_id')
            ->join('cities as ct','ct.id','=','mr.city_id')
            ->join('regions as r', 'r.id', '=', 'ct.region_id')
            ->join('countries as c', 'c.id', '=', 'r.country_id')
            ->where('c.id',1)
            ->where('ap.publish',true)
            ->where('st.publish',true)
            ->orderByDesc('discussions.created_at')
            ->get()
            ->all();

        $request = new Request();
        $request->query->add([
            'country' => 1
        ]);

        $actual = Discussion::filter($request->all())
            ->orderByDesc('discussions.created_at')
            ->get()
            ->all();

        $this->assertEquals($expected, $actual);
    }

    public function test_filter_with_region(){
        $expected = Discussion::query()
            ->select('discussions.*')
            ->join('apartments as ap', 'ap.id', '=', 'discussions.apartment_id')
            ->join('streets as st', 'st.id', '=', 'ap.street_id')
            ->join('microregions as mr', 'mr.id', '=', 'st.microregion_id')
            ->join('cities as ct','ct.id','=','mr.city_id')
            ->join('regions as r', 'r.id', '=', 'ct.region_id')
            ->join('countries as c', 'c.id', '=', 'r.country_id')
            ->where('c.id',1)
            ->where('r.id',1)
            ->where('ap.publish',true)
            ->where('st.publish',true)
            ->orderByDesc('discussions.created_at')
            ->get()
            ->all();

        $request = new Request();
        $request->query->add([
            'country' => 1,
            'region' => 1
        ]);

        $actual = Discussion::filter($request->all())
            ->orderByDesc('discussions.created_at')
            ->get()
            ->all();

        $this->assertEquals($expected, $actual);
    }

    public function test_filter_with_city(){
        $expected = Discussion::query()
            ->select('discussions.*')
            ->join('apartments as ap', 'ap.id', '=', 'discussions.apartment_id')
            ->join('streets as st', 'st.id', '=', 'ap.street_id')
            ->join('microregions as mr', 'mr.id', '=', 'st.microregion_id')
            ->join('cities as ct','ct.id','=','mr.city_id')
            ->join('regions as r', 'r.id', '=', 'ct.region_id')
            ->join('countries as c', 'c.id', '=', 'r.country_id')
            ->where('c.id',1)
            ->where('r.id',1)
            ->where('ct.id',1)
            ->where('ap.publish',true)
            ->where('st.publish',true)
            ->orderByDesc('discussions.created_at')
            ->get()
            ->all();

        $request = new Request();
        $request->query->add([
            'country' => 1,
            'region' => 1,
            'city' => 1
        ]);

        $actual = Discussion::filter($request->all())
            ->orderByDesc('discussions.created_at')
            ->get()
            ->all();

        $this->assertEquals($expected, $actual);
    }

    public function test_filter_with_microregion(){
        $expected = Discussion::query()
            ->select('discussions.*')
            ->join('apartments as ap', 'ap.id', '=', 'discussions.apartment_id')
            ->join('streets as st', 'st.id', '=', 'ap.street_id')
            ->join('microregions as mr', 'mr.id', '=', 'st.microregion_id')
            ->join('cities as ct','ct.id','=','mr.city_id')
            ->join('regions as r', 'r.id', '=', 'ct.region_id')
            ->join('countries as c', 'c.id', '=', 'r.country_id')
            ->where('c.id',1)
            ->where('r.id',1)
            ->where('ct.id',1)
            ->where('m.id',1)
            ->where('ap.publish',true)
            ->where('st.publish',true)
            ->orderByDesc('discussions.created_at')
            ->get()
            ->all();

        $request = new Request();
        $request->query->add([
            'country' => 1,
            'region' => 1,
            'city' => 1,
            'microregion' => 1
        ]);

        $actual = Discussion::filter($request->all())
            ->orderByDesc('discussions.created_at')
            ->get()
            ->all();

        $this->assertEquals($expected, $actual);
    }
}
