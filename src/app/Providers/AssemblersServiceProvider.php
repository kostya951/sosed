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

use App\Core\Assemblers\Cities\CityToCityApiAssembler;
use App\Core\Assemblers\Cities\CityToCityApiAssemblerInterface;
use App\Core\Assemblers\Countries\CountryToCountryApiAssembler;
use App\Core\Assemblers\Countries\CountryToCountryApiAssemblerInterface;
use App\Core\Assemblers\Discussions\DiscussionAssembler;
use App\Core\Assemblers\Discussions\DiscussionAssemblerInterface;
use App\Core\Assemblers\Discussions\DiscussionsToDiscussionPageAssembler;
use App\Core\Assemblers\Discussions\DiscussionsToDiscussionPageAssemblerInterface;
use App\Core\Assemblers\Discussions\DiscussionToDiscussionCardAssembler;
use App\Core\Assemblers\Discussions\DiscussionToDiscussionCardAssemblerInterface;
use App\Core\Assemblers\Microregions\MicroregionToMicroregionApiAssembler;
use App\Core\Assemblers\Microregions\MicroregionToMicroregionApiAssemblerInterface;
use App\Core\Assemblers\News\NewsToLastNewsAssembler;
use App\Core\Assemblers\News\NewsToLastNewsAssemblerInterface;
use App\Core\Assemblers\Regions\RegionToRegionApiAssembler;
use App\Core\Assemblers\Regions\RegionToRegionApiAssemblerInterface;
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
        $this->app->bind(DiscussionToDiscussionCardAssemblerInterface::class,function($app){
            return new DiscussionToDiscussionCardAssembler();
        });
        $this->app->bind(DiscussionsToDiscussionPageAssemblerInterface::class,function($app){
            return new DiscussionsToDiscussionPageAssembler($app->make(DiscussionToDiscussionCardAssemblerInterface::class));
        });
        $this->app->bind(DiscussionAssemblerInterface::class,function($app){
            return new DiscussionAssembler();
        });
        $this->app->bind(CountryToCountryApiAssemblerInterface::class,function($app){
            return new CountryToCountryApiAssembler();
        });
        $this->app->bind(RegionToRegionApiAssemblerInterface::class,function($app){
            return new RegionToRegionApiAssembler();
        });
        $this->app->bind(CityToCityApiAssemblerInterface::class,function($app){
            return new CityToCityApiAssembler();
        });
        $this->app->bind(MicroregionToMicroregionApiAssemblerInterface::class,function($app){
            return new MicroregionToMicroregionApiAssembler();
        });
    }

    public function boot(): void
    {
        //
    }
}
