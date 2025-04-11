<?php
/**
 * @var \App\Core\Dto\DiscussionPageDto $dto
 * @var string $query
 */
?>
<div class="col-12">
    <div class="row">
        <form method="GET" action="{{route("discussions.search")}}">
            <div class="input-group">
                <input class="form-control" type="text" name="query" placeholder="Поиск по обсуждениям" value="{{ $query ?? '' }}">
                <button class="btn btn-primary" type="submit">Найти</button>
            </div>
        </form>
    </div>
    <div class="row text-center"><span>Найдено {{$dto->totalDiscussions}} обсуждений</span></div>
    <div class="row">
        {!! $dto->links !!}
    </div>
    <div class="row">
            @foreach($dto->discussions as $discussion)
                <div class="col-6 mt-5 mb-5">
                    <x-discussioncard
                        title="{{$discussion->title}}"
                        username="{{$discussion->username}}"
                        date="{{$discussion->date}}"
                        slug="{{$discussion->slug}}"
                    ></x-discussioncard>
                </div>
            @endforeach
    </div>
    <div class="row">
        {!! $dto->links !!}
    </div>
</div>


