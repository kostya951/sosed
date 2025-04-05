<?php

namespace App\Core\Assemblers\News;

use App\Core\Dto\LastNewsDto;
use App\Models\News;

class NewsToLastNewsAssembler implements NewsToLastNewsAssemblerInterface
{

    public function assemble(News $news): LastNewsDto
    {
        $dto = new LastNewsDto();
        $dto->title = $news->title;
        $dto->description = $news->description;
        $dto->date = $news->created_at;
        return $dto;
    }
}
