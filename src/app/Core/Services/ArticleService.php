<?php

namespace App\Core\Services;

use App\Core\Assemblers\ArticleToLastArticleAssemblerInterface;
use App\Core\Dto\LastArticleDto;
use App\Models\Article;

class ArticleService implements ArticleServiceInterface
{

    private ArticleToLastArticleAssemblerInterface $assembler;

    public function __construct(ArticleToLastArticleAssemblerInterface $assembler){
        $this->assembler = $assembler;
    }

    /**
     * @inheritDoc
     */
    public function getLastArticles(int $count = 9): array
    {
        $articles = Article::query()
            ->orderByDesc('created_at')
            ->limit($count)
            ->get();

        $result=[];
        foreach ($articles as $article){
            $result[] = $this->assembler->assemble($article);
        }
        return $result;
    }
}
