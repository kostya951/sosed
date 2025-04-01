<?php
    /**
     * @var \App\Core\Dto\LastNewsDto[] $news
     */
?>
<h1 class="text-center mt-5">Последние новости!</h1>
<div class="col-md-12">
    <div class="row">
        @forelse($news as $new)
            <div class="col-5 mx-1 my-5">
                <x-newscard
                    title="{{$new->title}}"
                    description="{{$new->description}}"
                    date="{{$new->date}}"
                ></x-newscard>
            </div>
        @empty
            <div class="col-12 text-center">
                Ничего ещё не произошло...
            </div>
        @endforelse
    </div>
    @if(!empty($news))
        <div class="row justify-content-center mt-3">
            <div class="col-3 text-center">
                <a class="btn btn-primary" href="#">Посмотреть все новости!</a>
            </div>
        </div>
    @endif
</div>
