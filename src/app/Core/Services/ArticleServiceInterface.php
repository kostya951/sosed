<?php

namespace App\Core\Services;

use App\Core\Dto\LastArticleDto;

interface ArticleServiceInterface
{
    /**
     * @param int $count
     * @return LastArticleDto[]
     */
    public function getLastArticles(int $count = 9):array;
}
