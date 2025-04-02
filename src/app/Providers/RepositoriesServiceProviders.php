<?php

namespace App\Providers;

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
    }

    public function boot(): void
    {
        //
    }
}
