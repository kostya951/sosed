<?php

namespace App\Core\Services\Test;

use App\Core\Dto\LastNewsDto;

class TestNewsService implements \App\Core\Services\NewsServiceInterface
{

    /**
     * @inheritDoc
     */
    public function getLastNews(int $count = 9): array
    {
        $result = [];

        for($i=0;$i<$count;$i++){
            $dto = new LastNewsDto();
            $dto->date = '2025-05-25 16:30';
            $dto->description = 'Description '.$i;
            $dto->title='Title '.$i;
            $result[] = $dto;
        }

        return $result;
    }
}
