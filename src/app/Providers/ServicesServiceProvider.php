<?php

namespace App\Providers;

use App\Core\Assemblers\Ads\AdsToLastAdsAssemblerInterface;
use App\Core\Assemblers\Articles\ArticlesToArticlePageAssemblerInterface;
use App\Core\Assemblers\Articles\ArticleToArticleCardAssemblerInterface;
use App\Core\Assemblers\Discussions\DiscussionsToDiscussionPageAssemblerInterface;
use App\Core\Assemblers\News\NewsToLastNewsAssemblerInterface;
use App\Core\Assemblers\Users\UserToLastUserAssemblerInterface;
use App\Core\Repositories\ArticleRepositoryInterface;
use App\Core\Repositories\UserRepositoryInterface;
use App\Core\Services\AdsService;
use App\Core\Services\AdsServiceInterface;
use App\Core\Services\ArticleService;
use App\Core\Services\ArticleServiceInterface;
use App\Core\Services\DiscussionService;
use App\Core\Services\DiscussionServiceInterface;
use App\Core\Services\NewsService;
use App\Core\Services\NewsServiceInterface;
use App\Core\Services\SecurityService;
use App\Core\Services\SecurityServiceInterface;
use App\Core\Services\UserService;
use App\Core\Services\UserServiceInterface;
use Illuminate\Support\ServiceProvider;

class ServicesServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(UserServiceInterface::class,function($app){
                return new UserService($app->make(UserToLastUserAssemblerInterface::class));
        });
        $this->app->bind(AdsServiceInterface::class,function($app){
            return new AdsService($app->make(AdsToLastAdsAssemblerInterface::class));
        });
        $this->app->bind(ArticleServiceInterface::class,function($app){
            return new ArticleService(
                $app->make(ArticleRepositoryInterface::class),
                $app->make(ArticleToArticleCardAssemblerInterface::class),
                $app->make(ArticlesToArticlePageAssemblerInterface::class)
            );
        });
        $this->app->bind(NewsServiceInterface::class,function($app){
            return new NewsService($app->make(NewsToLastNewsAssemblerInterface::class));
        });
        $this->app->bind(SecurityServiceInterface::class,function($app){
            return new SecurityService($app->make(UserRepositoryInterface::class));
        });
        $this->app->bind(DiscussionServiceInterface::class,function($app){
            return new DiscussionService($app->make(DiscussionsToDiscussionPageAssemblerInterface::class));
        });
    }

    public function boot(): void
    {
        //
    }
}
