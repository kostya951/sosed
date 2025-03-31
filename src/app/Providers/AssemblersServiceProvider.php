<?php

namespace App\Providers;

use App\Core\Assemblers\UserToLastUserAssembler;
use App\Core\Assemblers\UserToLastUserAssemblerInterface;
use Illuminate\Support\ServiceProvider;

class AssemblersServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        $this->app->bind(UserToLastUserAssemblerInterface::class,function($app){
            return new UserToLastUserAssembler();
        });
    }

    public function boot(): void
    {
        //
    }
}
