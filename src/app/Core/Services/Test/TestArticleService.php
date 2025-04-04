<?php

namespace App\Core\Services\Test;

use App\Core\Dto\ArticleCardDto;
use App\Core\Dto\ArticlesPageDto;
use App\Core\Services\ArticleServiceInterface;

class TestArticleService implements ArticleServiceInterface
{

    /**
     * @inheritDoc
     */
    public function getLastArticles(int $count = 9): array
    {
        $result = [];

        for($i=0;$i<$count;$i++){
            $dto = new ArticleCardDto();
            $dto->category = 'Test Category';
            $dto->description='Lorem ispum dolores bin var vendor uprugus';
            $dto->title='Test Title '.$i;
            $dto->date = '2025-05-25 16:30';
            $result[] = $dto;
        }

        return $result;
    }

    /**
     * @inheritDoc
     */
    public function getAllArticles(int $count = 10): ArticlesPageDto
    {
        $dto = new ArticlesPageDto();
        return $dto;
    }
}
