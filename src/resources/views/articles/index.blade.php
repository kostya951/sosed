<?php
/**
 * @var \App\Core\Dto\ArticlesPageDto $dto
 */

?>
@extends('layouts.app')
@section('content')
    <div class="container">
        @if(empty($dto->articles))
            <h3>Пока нету статей! Будьте первым! Пройдите регистрацию и напишите статью!</h3>
        @else
            <div class="row text-start">
                Найдено статей: {{$dto->totalArticles}}
            </div>
            <div class="row">
            @foreach($dto->articles as $article)
                <div class="col-md-3 col-sm-6">
                    <x-articlecard
                    title="{{$article->title}}"
                    description="{{$article->description}}"
                    date="{{$article->date}}"
                    category="{{$article->category}}"
                    slug="{{$article->slug}}"
                    ></x-articlecard>
                </div>
            @endforeach
        </div>
        <div class="row">
            {!!  $dto->links !!}
        </div>
        @endif
    </div>
@endsection



