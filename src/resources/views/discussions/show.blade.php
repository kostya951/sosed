<?php
/**
 * @var \App\Core\Dto\DiscussionDto $discussion
 */

?>
@extends('layouts.app')
@section('content')
    <div class="container min-vh-100">
        <h1>{{$discussion->title}}</h1>
        <h2><a href="{{route('user.profile',['user'=>$discussion->userSlug])}}">{{$discussion->username}}</a></h2>
        <h4>{{$discussion->date}}</h4>
        <span class="mb-3">{{$discussion->address}}</span>
        <p>{{$discussion->body}}</p>
    </div>
@endsection
