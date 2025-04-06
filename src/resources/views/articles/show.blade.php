<?php
    /**
     * @var \App\Core\Dto\ArticleDto $article
     */
?>
@extends('layouts.app')
@section('content')
    <div class="container min-vh-100">
        <div class="row">
            <h1>{{$article->title}}</h1>
            <h2>{{$article->description}}</h2>
            <span class="ads-category col-4">Категория: {{$article->category}}</span>
            <span class="col-4">Автор: <a href="{{route('user.profile',['user'=>$article->userSlug])}}">{{$article->username}}</a></span>
            <span>{{$article->date}}</span>
            <span class="d-block"><img class="d-inline" src="/img/eye-fill.svg" alt="Просмотры"/> {{$article->see}}</span>
            <p>{{$article->body}}</p>
        </div>
    </div>
@endsection
