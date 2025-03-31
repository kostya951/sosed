<?php
    /**
     * @var Symfony\Component\HttpKernel\Exception\HttpException $exception
     */
?>
@extends('layouts.app')
@section('content')
    <div class="container justify-content-center">
        <h1 class="text-center">404 Not Found</h1>
        @if(config('app.debug') == true)
            <p class="text-center">{{ $exception->getMessage()}} on line {{ $exception->getLine() }} in file {{ $exception->getFile() }}</p>
        @endif
    </div>
@endsection
