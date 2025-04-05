<?php

namespace App\Core\Services;

use App\Core\Assemblers\News\NewsToLastNewsAssemblerInterface;
use App\Core\Dto\LastNewsDto;
use App\Models\News;

class NewsService implements NewsServiceInterface
{

    private NewsToLastNewsAssemblerInterface $assembler;

    public function __construct(NewsToLastNewsAssemblerInterface $assembler)
    {
        $this->assembler = $assembler;
    }

    /**
     * @inheritDoc
     */
    public function getLastNews(int $count = 9): array
    {
        $news = News::query()
            ->orderByDesc('created_at')
            ->limit($count)
            ->get();

        $result= [];
        foreach ($news as $new){
            $result[] = $this->assembler->assemble($new);
        }

        return $result;
    }
}
