<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ArticleControllerTest extends TestCase
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
        $users = User::factory()
            ->count(5)
            ->create();
        $categories = ArticleCategory::factory()->count(5)->create();
        $articles =  Article::factory()
            ->count(30)
            ->sequence(function(Sequence $sequence){
                return [
                    'category_id' => ArticleCategory::all()->random()->id,
                    'publish_user_id' => User::all()->random()->id
                ];
            })
            ->create();
    }

    public function test_basic_route(): void
    {
        $response = $this->get(route('articles'));
        $response->assertStatus(200);
    }

    public function test_get_all_articles_page_1(){
        $response = $this->get(route('articles'));
        $response->assertStatus(200);

        $expected = Article::query()
            ->orderByDesc('created_at')
            ->offset(0)
            ->limit(10)
            ->get()
            ->pluck('title')
            ->all();

        $response->assertSee($expected);
    }

    public function test_get_all_articles_page_2(){
        $response = $this->get('/articles?page=2');
        $response->assertStatus(200);

        $expected = Article::query()
            ->orderByDesc('created_at')
            ->offset(10)
            ->limit(10)
            ->get()
            ->pluck('title')
            ->all();

        $response->assertSee($expected);
    }
}
