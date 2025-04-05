<?php

namespace App\Core\Assemblers\Articles;

use App\Core\Dto\ArticleCardDto;
use App\Core\Traits\HasNoPhoto;
use App\Models\Article;

class ArticleToArticleCardAssembler implements ArticleToArticleCardAssemblerInterface
{
    /**
     * @inheritDoc
     */
    public function assemble(Article $article): ArticleCardDto
    {
        $dto = new ArticleCardDto();
        $dto->title = $article->title;
        $dto->description = $article->description;
        $dto->date = $article->created_at;
        $dto->category = $article->category->title;
        $dto->slug = $article->slug;
        return $dto;
    }
}
