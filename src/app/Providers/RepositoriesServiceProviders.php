<?php

namespace App\Providers;

use App\Core\Repositories\ArticleRepository;
use App\Core\Repositories\ArticleRepositoryInterface;
use App\Core\Repositories\UserRepository;
use App\Core\Repositories\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProviders extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class,function($app){
            return new UserRepository();
        });
        $this->app->bind(ArticleRepositoryInterface::class,function($app){
            return new ArticleRepository();
        });
    }

    public function boot(): void
    {
        //
    }
}
