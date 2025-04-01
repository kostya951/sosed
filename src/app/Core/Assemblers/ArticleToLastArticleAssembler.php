<?php

namespace App\Core\Assemblers;

use App\Core\Dto\LastArticleDto;
use App\Models\Article;

class ArticleToLastArticleAssembler implements ArticleToLastArticleAssemblerInterface
{

    public function assemble(Article $article): LastArticleDto
    {
        $dto = new LastArticleDto();
        $dto->title = $article->title;
        $dto->date = $article->created_at;
        $dto->category = $article->category->title;
        $dto->description = $article->description;
        return $dto;
    }
}
