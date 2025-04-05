<?php

namespace Tests\Unit;

use App\Core\Assemblers\ArticlesToArticlePageAssembler;
use App\Core\Assemblers\ArticleToArticleCardAssembler;
use App\Core\Assemblers\ArticleToLastArticleAssembler;
use App\Core\Repositories\ArticleRepository;
use App\Core\Services\ArticleService;
use App\Core\Services\ArticleServiceInterface;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class ArticleServiceTest extends TestCase
{
    use DatabaseTransactions;

    private ArticleServiceInterface $service;

    public function __construct(string $name)
    {
        parent::__construct($name);
        $this->service = new ArticleService(
            new ArticleRepository(),
            new ArticleToArticleCardAssembler(),
            new ArticlesToArticlePageAssembler(
                new ArticleToArticleCardAssembler()
            )
        );
    }

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
            ->count(20)
            ->sequence(function(Sequence $sequence){
                return [
                    'category_id' => ArticleCategory::all()->random()->id,
                    'publish_user_id' => User::all()->random()->id
                ];
            })
            ->create();
    }

    public function test_get_last_articles(){
        $expected = Article::query()
            ->orderByDesc('created_at')
            ->limit(6)
            ->get()
            ->pluck('title')
            ->all();

        $given = $this->service->getLastArticles();
        $given = array_column($given,'title');

        $this->assertCount(6,$given);
        $this->assertEquals($expected,$given);
    }

//    public function test_get_all_articles(){
//        $expected = Article::query()->orderByDesc('created_at');
//    }
}
