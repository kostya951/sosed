@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5 mb-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Сброс Пароля</div>
                    <div class="card-body">
                        <form method="POST" action="{{route('password.email')}}">
                            @csrf
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail адресс</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" name="email" value="" required="required" autocomplete="email" autofocus="autofocus" class="form-control"></div>
                            </div>
                            <div class="form-group row mb-0 mt-3    ">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">Отправить ссылку на изменения пароля</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
