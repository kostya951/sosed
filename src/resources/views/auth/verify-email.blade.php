@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="mb-4 text-sm text-gray-600">
                    {{ __('Спасибо за регистрацию! Перед началом, Вам нужно подтвердить адресс электронной почты кликнув по ссылке, которую мы только что вам прислали по почте. Если вы не получили письмо, мы пришлём вам новое.') }}
                </div>
                @if (session('status') == 'verification-link-sent')
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ __('Новая ссылка для подтверждения электронной почты была отправлена по адресу который Вы предоставили при регистарции.') }}
                    </div>
                @endif
                <div class="mt-4 flex items-center justify-between">
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <div>
                            <button type='submit' class='btn btn-primary mb-5'>
                                {{ __('Переотправить ссылку для подтверждения') }}
                            </button>
                        </div>
                    </form>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-secondary">
                            {{ __('Выйти') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

