<?php

namespace App\Http\Controllers;

use App\Core\Services\UserServiceInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(
        UserServiceInterface $service
    ){
        $users = $service->getLastUsers();
        return view('home',['users'=>$users]);
    }
}
