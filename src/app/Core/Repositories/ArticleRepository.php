<?php

namespace App\Core\Repositories;

use App\Models\Article;

class ArticleRepository implements ArticleRepositoryInterface
{

    /**
     * @inheritDoc
     */
    public function getLastArticles(int $count): array
    {
        return Article::query()
            ->orderByDesc('created_at')
            ->limit($count)
            ->get()
            ->all();
    }
}
