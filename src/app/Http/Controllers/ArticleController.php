<?php

namespace App\Http\Controllers;

use App\Core\Services\ArticleServiceInterface;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(Request $request, ArticleServiceInterface $service){
        $dto = $service->getAllArticles();
        return view('articles.index',['dto'=>$dto]);
    }
}
