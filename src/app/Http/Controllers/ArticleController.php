<?php

namespace App\Http\Controllers;

use App\Core\Assemblers\Articles\ArticleAssemblerInterface;
use App\Core\Services\ArticleServiceInterface;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(ArticleServiceInterface $service){
        $dto = $service->getAllArticles();
        return view('articles.index',['dto'=>$dto]);
    }

    public function show(Article $article,
        ArticleAssemblerInterface $assembler
    )
    {
        $article->see = $article->see + 1;
        $article->save();
        $dto = $assembler->assemble($article);
        return view('articles.show',['article'=>$dto]);
    }
}
