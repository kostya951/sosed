<?php

namespace App\Providers;

use App\Core\Assemblers\Ads\AdsToLastAdsAssemblerInterface;
use App\Core\Assemblers\Articles\ArticlesToArticlePageAssemblerInterface;
use App\Core\Assemblers\Articles\ArticleToArticleCardAssemblerInterface;
use App\Core\Assemblers\Cities\CityToCityApiAssemblerInterface;
use App\Core\Assemblers\Countries\CountryToCountryApiAssemblerInterface;
use App\Core\Assemblers\Discussions\DiscussionsToDiscussionPageAssemblerInterface;
use App\Core\Assemblers\Microregions\MicroregionToMicroregionApiAssemblerInterface;
use App\Core\Assemblers\News\NewsToLastNewsAssemblerInterface;
use App\Core\Assemblers\Regions\RegionToRegionApiAssemblerInterface;
use App\Core\Assemblers\Users\UserToLastUserAssemblerInterface;
use App\Core\Repositories\ArticleRepositoryInterface;
use App\Core\Repositories\UserRepositoryInterface;
use App\Core\Services\AdsService;
use App\Core\Services\AdsServiceInterface;
use App\Core\Services\ArticleService;
use App\Core\Services\ArticleServiceInterface;
use App\Core\Services\CityService;
use App\Core\Services\CityServiceInterface;
use App\Core\Services\CountryService;
use App\Core\Services\CountryServiceInterface;
use App\Core\Services\DiscussionService;
use App\Core\Services\DiscussionServiceInterface;
use App\Core\Services\MicroregionService;
use App\Core\Services\MicroregionServiceInterface;
use App\Core\Services\NewsService;
use App\Core\Services\NewsServiceInterface;
use App\Core\Services\RegionService;
use App\Core\Services\RegionServiceInterface;
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
        $this->app->bind(CountryServiceInterface::class,function($app){
            return new CountryService($app->make(CountryToCountryApiAssemblerInterface::class));
        });
        $this->app->bind(RegionServiceInterface::class,function($app){
            return new RegionService($app->make(RegionToRegionApiAssemblerInterface::class));
        });
        $this->app->bind(CityServiceInterface::class,function($app){
           return new CityService($app->make(CityToCityApiAssemblerInterface::class));
        });
        $this->app->bind(MicroregionServiceInterface::class,function($app){
            return new MicroregionService($app->make(MicroregionToMicroregionApiAssemblerInterface::class));
        });
    }

    public function boot(): void
    {
        //
    }
}
