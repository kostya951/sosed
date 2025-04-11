<?php
/**
 * @var \App\Core\Dto\DiscussionPageDto $dto
 * @var string $query
 */
?>
@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Обсуждения</h1>
        @if(!empty($dto->discussions))
            <div class="row">
                <div id="discussions-wrapper" class="col-7">
                    @include('discussions.discussions',['dto'=>$dto,'query'=>$query ?? ''])
                </div>
{{--  @TODO сделать фильтр              --}}
{{--                <div class="col-4 mt-5">--}}
{{--                    <discussion-filter>--}}
{{--                    </discussion-filter>--}}
{{--                </div>--}}
            </div>
        @else
            <h3> Ещё нет обсуждений! Будьте первым!</h3>
        @endif
    </div>
@endsection
