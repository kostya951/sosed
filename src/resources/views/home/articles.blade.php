<?php
    /**
     * @var \App\Core\Dto\ArticleCardDto[] $articles
     */
?>
<h1 class="text-center mt-5">Последние статьи!</h1>
<div class="col-md-12">
    <div class="row">
        @forelse($articles as $article)
            <div class="col-5 mx-1 my-5">
                <x-articlecard
                    title="{{$article->title}}"
                    description="{{$article->description}}"
                    date="{{$article->date}}"
                    category="{{$article->category}}"
                    slug="{{$article->slug}}"
                ></x-articlecard>
            </div>
        @empty
            <div class="col-12 text-center">
                Нету статей ещё! Будьте первым! Зарегистрируйтесь и напишите статью!
            </div>
        @endforelse
    </div>
    @if(!empty($articles))
        <div class="row justify-content-center mt-3">
            <div class="col-3 text-center">
                <a class="btn btn-primary" href="{{route('articles')}}">Посмотреть все статьи!</a>
            </div>
        </div>
    @endif
</div>
