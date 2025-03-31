<?php

namespace App\Http\Controllers;

use App\Core\Services\AdsServiceInterface;
use App\Core\Services\UserServiceInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(
        UserServiceInterface $userService,
        AdsServiceInterface $adsService
    ){
        $users = $userService->getLastUsers();
        $ads = $adsService->getLastAds();
        return view('home.index',[
                'users'=>$users,
                'ads'=>$ads
            ]
        );
    }
}
