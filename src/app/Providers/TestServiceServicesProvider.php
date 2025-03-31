<?php

namespace App\Providers;

use App\Core\Services\AdsServiceInterface;
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
    }

    public function boot(): void
    {
        //
    }
}
