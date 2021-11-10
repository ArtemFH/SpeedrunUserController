@extends('layouts.base')
@section('head')
    @parent
    <title>{{ $title }}</title>
@endsection
@section('body')
    <form class="col-3" method="POST" action="{{ route('user.login') }}">
        @csrf
        <div class="form-group">
            <label for="email" class="col-form-label-lg">E-mail</label>
            <input id="email" class="form-control" name="email" autocomplete="off" type="email" value="" placeholder="Введите e-mail" required>
        </div>
        <div class="form-group">
            <label for="password" class="col-form-label-lg">Пароль</label>
            <input id="password" class="form-control" name="password" type="password" value="" placeholder="Введите пароль" required>
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group center">
            <button class="buttonSuccess btn btn-lg btn-primary" type="submit" name="send" value="1">Login</button>
        </div>
    </form>
@endsection
