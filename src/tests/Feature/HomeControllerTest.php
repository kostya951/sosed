<?php

namespace Tests\Feature;

use App\Models\Ad;
use App\Models\AdCategory;
use App\Models\Apartment;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\City;
use App\Models\Company;
use App\Models\Country;
use App\Models\Microregion;
use App\Models\News;
use App\Models\Region;
use App\Models\Role;
use App\Models\Street;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class HomeControllerTest extends TestCase
{
    use DatabaseTransactions;

    public function setUp(): void
    {
        parent::setUp();
        Role::create([
            'id'=>1,
            'name'=>'citizen',
            'label'=>'Житель'
        ]);

        Role::create([
            'id'=>2,
            'name'=>'admin',
            'label'=>'Администратор'
        ]);
    }

    public function test_basic_route_shows_users()
    {
        $normalUsers = User::factory()->count(3)->create()->pluck('name')->toArray();
        $unverifiedUsers= User::factory()->count(3)->unverified()->create()->pluck('name')->toArray();
        $blockedUsers = User::factory()->count(1)->blocked()->create()->pluck('name')->toArray();
        $deletedUsers = User::factory()->count(1)->deleted()->create()->pluck('name')->toArray();
        $adminUsers = User::factory()->count(1)->isAdmin()->create()->pluck('name')->toArray();

        $response = $this->get('/');
        $response->assertStatus(200);

        $response->assertSee($normalUsers);
        $response->assertDontSee($unverifiedUsers);
        $response->assertDontSee($blockedUsers);
        $response->assertDontSee($deletedUsers);
        $response->assertDontSee($adminUsers);
    }

    public function test_basic_route_shows_ads(){
        $country = Country::factory()->count(1)->create();

        $region = Region::factory()
            ->count(5)
            ->create();

        $cities = City::factory()
            ->sequence(function(Sequence $sequence){
                return [
                    'region_id' => Region::all()->random()->id
                ];
            })
            ->count(10)
            ->create();

        $microregions = Microregion::factory()
            ->sequence(function(Sequence $sequence){
                return [
                    'city_id' => City::all()->random()->id
                ];
            })
            ->for(User::factory())
            ->published()
            ->count(10)
            ->create();

        $streets = Street::factory()
            ->sequence(function(Sequence $sequence){
                return [
                    'microregion_id' => Microregion::all()->random()->id
                ];
            })
            ->for(User::factory())
            ->published()
            ->count(20)
            ->create();

        $apartments = Apartment::factory()
            ->sequence(function (Sequence $sequence){
                return [
                    'street_id' => Street::all()->random()->id
                ];
            })
            ->published()
            ->count(20)
            ->create();

        $categories = AdCategory::factory()->count(5)->create()->pluck('id');

        $ads = Ad::factory()
            ->for(User::factory())
            ->sequence(function (Sequence $sequence){
                return [
                    'category_id' => AdCategory::all()->random()->id,
                    'apartment_id' => Apartment::all()->random()->id
                ];
            })
            ->count(9)
            ->create()
            ->load(['category','user']);

        $response = $this->get('/');
        $response->assertStatus(200);

        $ads->each(function(Ad $ad) use($response){
           $response->assertSee($ad->title);
           $response->assertSee($ad->category->title);
        });
    }

    public function test_basic_route_shows_articles(){
        $users = User::factory()->count(10)->create();
        $articleCategories = ArticleCategory::factory()->count(10)->create();

        $articles = Article::factory()
            ->sequence(function(Sequence $sequence){
                return [
                    'category_id' => ArticleCategory::all()->random()->id,
                    'publish_user_id' => User::all()->random()->id,
                ];
            })
            ->count(6)
            ->create()
            ->pluck('title')
            ->toArray();

        $response = $this->get('/');
        $response->assertStatus(200);

        $response->assertSee($articles);
    }

    public function test_basic_route_shows_news(){
        $country = Country::factory()->count(1)->create();

        $region = Region::factory()
            ->count(5)
            ->create();

        $cities = City::factory()
            ->sequence(function(Sequence $sequence){
                return [
                    'region_id' => Region::all()->random()->id
                ];
            })
            ->count(10)
            ->create();

        $microregions = Microregion::factory()
            ->sequence(function(Sequence $sequence){
                return [
                    'city_id' => City::all()->random()->id
                ];
            })
            ->for(User::factory())
            ->published()
            ->count(10)
            ->create();

        $streets = Street::factory()
            ->sequence(function(Sequence $sequence){
                return [
                    'microregion_id' => Microregion::all()->random()->id
                ];
            })
            ->for(User::factory())
            ->published()
            ->count(20)
            ->create();

        $apartments = Apartment::factory()
            ->sequence(function (Sequence $sequence){
                return [
                    'street_id' => Street::all()->random()->id
                ];
            })
            ->published()
            ->count(20)
            ->create();

        $companies = Company::factory()->count(10)->create();

        $news = News::factory()
            ->sequence(function(Sequence $sequence){
                return [
                    'apartment_id' => Apartment::all()->random()->id,
                    'company_id' => Company::all()->random()->id,
                ];
            })
            ->count(6)
            ->create()
            ->pluck('title')
            ->toArray();

        $response = $this->get('/');
        $response->assertSee($news);
    }
}
