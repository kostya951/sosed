<?php
    /**
     * @var \App\Core\Dto\LastUserDto[] $users
     * @var \App\Core\Dto\LastAdsDto[] $ads
     * @var \App\Core\Dto\ArticleCardDto[] $articles
     */
?>
@extends('layouts.app')

@section('content')
    <div class="top">
        <div class="container">
            <h1 style="color: white;"><strong>Добро пожаловать в социальную сеть “Здесь мой сосед”</strong></h1>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center mt-5">
            @include('home.neighbours',['users'=>$users])
        </div>
        <div class="row justify-content-center mt-5">
            @include('home.ads',['ads'=>$ads])
        </div>
        <div class="row justify-content-center mt-5">
            @include('home.articles',['articles'=>$articles])
        </div>
        <div class="row justify-content-center mt-5 mb-5">
            @include('home.news',['news'=>$news])
        </div>
    </div>
@endsection
