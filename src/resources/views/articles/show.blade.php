<?php
    /**
     * @var \App\Core\Dto\ArticleDto $article
     */
?>
@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
{{-- @TODO вывести ссылку на профиль пользователя опубликовавшего статью            --}}
            <h1>{{$article->title}}</h1>
            <h2>{{$article->description}}</h2>
            <span class="ads-category col-4">Категория: {{$article->category}}</span>
            <span>{{$article->date}}</span>
            <p>{{$article->body}}</p>
        </div>
    </div>
@endsection
