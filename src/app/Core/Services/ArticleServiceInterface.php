<?php

namespace App\Core\Services;

use App\Core\Dto\ArticleCardDto;
use App\Core\Dto\ArticlesPageDto;

interface ArticleServiceInterface
{
    /**
     * @param int $count
     * @return ArticleCardDto[]
     */
    public function getLastArticles(int $count = 9):array;

    /**
     * @param int $count Количество выводимых статье на страницу
     * @return ArticlesPageDto
     */
    public function getAllArticles(int $count=10):ArticlesPageDto;
}
