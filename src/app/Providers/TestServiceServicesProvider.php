<?php

namespace App\Providers;

use App\Core\Services\AdsServiceInterface;
use App\Core\Services\ArticleServiceInterface;
use App\Core\Services\Test\TestAdsService;
use App\Core\Services\Test\TestArticleService;
use App\Core\Services\Test\TestUserService;
use App\Core\Services\UserServiceInterface;

class TestServiceServicesProvider extends \Illuminate\Support\ServiceProvider
{
     public function register(): void
    {
        $this->app->bind(AdsServiceInterface::class,function($app){
            return new TestAdsService();
        });
        $this->app->bind(UserServiceInterface::class,function($app){
            return new TestUserService();
        });
        $this->app->bind(ArticleServiceInterface::class,function($app){
            return new TestArticleService();
        });
    }

    public function boot(): void
    {
        //
    }
}
