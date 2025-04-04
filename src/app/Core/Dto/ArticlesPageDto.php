<?php

namespace App\Core\Dto;

class ArticlesPageDto
{
    public int $totalArticles;

    /**
     * @var ArticleCardDto[]
     */
    public array $articles;
    public string $links;
}
