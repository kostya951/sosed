<?php

namespace App\Http\Controllers;

use App\Core\Services\AdsServiceInterface;
use App\Core\Services\ArticleServiceInterface;
use App\Core\Services\NewsServiceInterface;
use App\Core\Services\UserServiceInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(
        UserServiceInterface $userService,
        AdsServiceInterface $adsService,
        ArticleServiceInterface $articleService,
        NewsServiceInterface $newsService
    ){
        $users = $userService->getLastUsers();
        $ads = $adsService->getLastAds();
        $articles = $articleService->getLastArticles();
        $news = $newsService->getLastNews();

        return view('home.index',[
                'users'=>$users,
                'ads'=>$ads,
                'articles'=>$articles,
                'news'=>$news
            ]
        );
    }

    public function showSignupPage(){
        return view('auth.signup');
    }

    public function showLoginPage(){
        return view('auth.login');
    }
}
