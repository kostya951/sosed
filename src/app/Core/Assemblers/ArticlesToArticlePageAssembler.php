<?php

namespace App\Core\Assemblers;

use App\Core\Dto\ArticlesPageDto;
use App\Core\Repositories\ArticleRepositoryInterface;
use App\Models\Article;
use Illuminate\Support\Collection;

class ArticlesToArticlePageAssembler implements ArticlesToArticlePageAssemblerInterface
{

    private ArticleToArticleCardAssemblerInterface $assembler;

    public function __construct(
        ArticleToArticleCardAssemblerInterface $assembler
    ){
        $this->assembler = $assembler;
    }

    /**
     * @inheritDoc
     */
    public function assemble(Collection $articles): ArticlesPageDto
    {
        $dto = new ArticlesPageDto();
        $articlesDtoArray = [];

        foreach ($articles as $article){
            $articlesDtoArray[] = $this->assembler->assemble($article);
        }

        $dto->articles = $articlesDtoArray;
        return $dto;
    }
}
