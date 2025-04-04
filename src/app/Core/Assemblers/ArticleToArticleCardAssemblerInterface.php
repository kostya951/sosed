<?php

namespace App\Core\Assemblers;

use App\Core\Dto\ArticleCardDto;
use App\Models\Article;

interface ArticleToArticleCardAssemblerInterface
{
    /**
     * @param Article $article
     * @return ArticleCardDto
     */
    public function assemble(Article $article):ArticleCardDto;
}
