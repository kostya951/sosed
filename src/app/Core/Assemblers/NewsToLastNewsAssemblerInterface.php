<?php

namespace App\Core\Assemblers;

use App\Core\Dto\LastNewsDto;
use App\Models\News;

interface NewsToLastNewsAssemblerInterface
{
    public function assemble(News $news): LastNewsDto;
}
