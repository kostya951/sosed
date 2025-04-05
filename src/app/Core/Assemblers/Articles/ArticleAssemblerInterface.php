<?php

namespace App\Core\Assemblers\Articles;

use App\Core\Dto\ArticleDto;
use App\Models\Article;

interface ArticleAssemblerInterface
{
    public function assemble(Article $article): ArticleDto;
}
