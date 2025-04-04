<?php

namespace App\Core\Services;

use App\Core\Dto\ArticleCardDto;
use App\Core\Dto\ArticlesPageDto;

interface ArticleServiceInterface
{
    /**
     * @param int $count количество статей
     * @return ArticleCardDto[]
     */
    public function getLastArticles(int $count = 6):array;

    /**
     * @param int $count Количество выводимых статей на страницу
     * @return ArticlesPageDto
     */
    public function getAllArticles(int $count=10):ArticlesPageDto;
}
