<?php
    /**
     * @var \App\Core\Dto\LastUserDto[] $users
     * @var \App\Core\Dto\LastAdsDto[] $ads
     * @var \App\Core\Dto\LastArticleDto[] $articles
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
        <div class="row justify-content-center py-5">
            @include('home.neighbours',['users'=>$users])
        </div>
        <div class="row justify-content-center">
            @include('home.ads',['ads'=>$ads])
        </div>
        <div class="row justify-content-center">
            @include('home.articles',['articles'=>$articles])
        </div>
        <div class="row justify-content-center">
            @include('home.news',['news'=>$news])
        </div>
    </div>
@endsection
