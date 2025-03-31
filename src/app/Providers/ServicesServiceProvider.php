<?php

namespace App\Providers;

use App\Core\Assemblers\AdsToLastAdsAssemblerInterface;
use App\Core\Assemblers\UserToLastUserAssemblerInterface;
use App\Core\Services\AdsService;
use App\Core\Services\AdsServiceInterface;
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
    }

    public function boot(): void
    {
        //
    }
}
