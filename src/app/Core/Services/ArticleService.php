<?php

namespace App\Core\Services;

use App\Core\Assemblers\ArticlesToArticlePageAssemblerInterface;
use App\Core\Assemblers\ArticleToArticleCardAssemblerInterface;
use App\Core\Dto\ArticlesPageDto;
use App\Core\Repositories\ArticleRepositoryInterface;
use App\Models\Article;

class ArticleService implements ArticleServiceInterface
{

    private ArticleRepositoryInterface $repository;
    private ArticleToArticleCardAssemblerInterface $articleCardAssembler;
    private ArticlesToArticlePageAssemblerInterface $pageAssembler;

    public function __construct(
        ArticleRepositoryInterface $repository,
        ArticleToArticleCardAssemblerInterface $articleCardAssembler,
        ArticlesToArticlePageAssemblerInterface $pageAssembler,
    ){
        $this->repository = $repository;
        $this->articleCardAssembler = $articleCardAssembler;
        $this->pageAssembler = $pageAssembler;
    }

    /**
     * @inheritDoc
     */
    public function getLastArticles(int $count = 6): array
    {
        $articles = $this->repository->getLastArticles($count);

        $result=[];
        foreach ($articles as $article){
            $result[] = $this->articleCardAssembler->assemble($article);
        }
        return $result;
    }

    /**
     * @inheritDoc
     */
    public function getAllArticles(int $count=10): ArticlesPageDto
    {
        $articles = Article::query()->orderByDesc('created_at');
        $articles = $articles->paginate($count);

        $dto = $this->pageAssembler->assemble($articles->getCollection());

        $total = $articles->total();
        $links = $articles->links();

        $dto->totalArticles = $total;
        $dto->links = $links;

        return $dto;
    }
}
