<?php

namespace App\Core\Repositories;

use App\Models\Article;

interface ArticleRepositoryInterface
{
    /**
     * @param int $count
     * @return Article[]
     */
    public function getLastArticles(int $count):array;
}
