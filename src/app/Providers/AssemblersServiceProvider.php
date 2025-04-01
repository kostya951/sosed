<?php

namespace App\Providers;

use App\Core\Assemblers\AdsToLastAdsAssembler;
use App\Core\Assemblers\AdsToLastAdsAssemblerInterface;
use App\Core\Assemblers\ArticleToLastArticleAssembler;
use App\Core\Assemblers\ArticleToLastArticleAssemblerInterface;
use App\Core\Assemblers\NewsToLastNewsAssembler;
use App\Core\Assemblers\NewsToLastNewsAssemblerInterface;
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
        $this->app->bind(AdsToLastAdsAssemblerInterface::class,function($app){
            return new AdsToLastAdsAssembler();
        });
        $this->app->bind(ArticleToLastArticleAssemblerInterface::class, function($app){
            return new ArticleToLastArticleAssembler();
        });
        $this->app->bind(NewsToLastNewsAssemblerInterface::class,function($app){
            return new NewsToLastNewsAssembler();
        });
    }

    public function boot(): void
    {
        //
    }
}
