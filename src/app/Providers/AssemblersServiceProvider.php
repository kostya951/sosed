<?php

namespace App\Providers;


use App\Core\Assemblers\Ads\AdsToLastAdsAssembler;
use App\Core\Assemblers\Ads\AdsToLastAdsAssemblerInterface;
use App\Core\Assemblers\Articles\ArticleAssembler;
use App\Core\Assemblers\Articles\ArticleAssemblerInterface;
use App\Core\Assemblers\Articles\ArticlesToArticlePageAssembler;
use App\Core\Assemblers\Articles\ArticlesToArticlePageAssemblerInterface;
use App\Core\Assemblers\Articles\ArticleToArticleCardAssembler;
use App\Core\Assemblers\Articles\ArticleToArticleCardAssemblerInterface;

use App\Core\Assemblers\News\NewsToLastNewsAssembler;
use App\Core\Assemblers\News\NewsToLastNewsAssemblerInterface;
use App\Core\Assemblers\Users\UserToLastUserAssembler;
use App\Core\Assemblers\Users\UserToLastUserAssemblerInterface;
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
        $this->app->bind(NewsToLastNewsAssemblerInterface::class,function($app){
            return new NewsToLastNewsAssembler();
        });
        $this->app->bind(ArticleToArticleCardAssemblerInterface::class,function($app){
            return new ArticleToArticleCardAssembler();
        });
        $this->app->bind(ArticlesToArticlePageAssemblerInterface::class,function($app){
            return new ArticlesToArticlePageAssembler($app->make(ArticleToArticleCardAssemblerInterface::class));
        });
        $this->app->bind(ArticleAssemblerInterface::class,function($app){
            return new ArticleAssembler();
        });
    }

    public function boot(): void
    {
        //
    }
}
