<?php

namespace App\Core\Assemblers;

use App\Core\Dto\ArticlesPageDto;
use App\Models\Article;
use Illuminate\Support\Collection;

interface ArticlesToArticlePageAssemblerInterface
{
    /**
     * @param Collection $articles
     * @return ArticlesPageDto
     */
    public function assemble(Collection $articles): ArticlesPageDto;
}
