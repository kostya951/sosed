<?php

namespace App\Core\Assemblers;

use App\Core\Dto\LastArticleDto;
use App\Models\Article;

interface ArticleToLastArticleAssemblerInterface
{
    public function assemble(Article $article):LastArticleDto;
}
