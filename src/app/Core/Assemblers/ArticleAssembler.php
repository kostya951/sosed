<?php

namespace App\Core\Assemblers;

use App\Core\Dto\ArticleDto;
use App\Core\Traits\HasNoPhoto;
use App\Models\Article;

class ArticleAssembler implements ArticleAssemblerInterface
{

    use HasNoPhoto;

    public function assemble(Article $article): ArticleDto
    {
        $dto = new ArticleDto();
        $dto->title = $article->title;
        $dto->description = $article->description;
        $dto->body = $article->body;
        $dto->slug = $article->slug;
        $dto->photo = empty($article->photo) ? $this->noPhotoPath : $article->photo;
        $dto->category = $article->category->title;
        $dto->date = $article->created_at;
        $dto->username = $article->user->name;
        $dto->userSlug = $article->user->slug;
        return $dto;
    }

}
