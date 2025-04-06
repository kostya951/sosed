<?php
/**
 * @var \App\Core\Dto\DiscussionPageDto $dto
 */
?>
@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Обсуждения</h1>
        @if(!empty($dto->discussions))
            <div class="row">
                <form method="POST" action="{{route("discussions/search")}}"></form>
            </div>
            <div class="row text-center"><span>Найдено {{$dto->totalDiscussions}} обсуждений</span></div>
            @foreach($dto->discussions as $discussion)
                <div class="col-4 mt-5 mb-5">
                    <x-discussioncard
                        title="{{$discussion->title}}"
                        username="{{$discussion->username}}"
                        date="{{$discussion->date}}"
                        slug="{{$discussion->slug}}"
                    ></x-discussioncard>
                </div>
            @endforeach
            <div class="row">
                {!! $dto->links !!}
            </div>
        @else
            <h3> Ещё нет обсуждений! Будьте первым!</h3>
        @endif
    </div>
@endsection



