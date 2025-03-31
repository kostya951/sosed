@extends('layouts.app')

@section('content')
    <div class="top">
        <div class="container">
            <h1 style="color: white;"><strong>Добро пожаловать в социальную сеть “Здесь мой сосед”</strong></h1>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center py-5">
            <h1 class="text-center">Твои соседи уже здесь!</h1>
            <div class="col-md-12">
                <div class="row">
                    @forelse($users as $user)
                        <div class="col-2">
                            <x-usercard userPhotoPath="{{ $user->photo }}" userName="{{ $user->name }}"></x-usercard>
                        </div>
                    @empty
                        <div class="col-12 text-center">
                            Нету пользователей ещё! Будьте первым!
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
