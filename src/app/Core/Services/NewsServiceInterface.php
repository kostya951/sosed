<?php

namespace App\Core\Services;

use App\Core\Dto\LastNewsDto;

interface NewsServiceInterface
{
    /**
     * Возвращает список последних новостей
     * @param int $count
     * @return LastNewsDto[]
     */
    public function getLastNews(int $count = 9): array;
}
