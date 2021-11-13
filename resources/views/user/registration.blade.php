@extends('layouts.base')
@section('head')
    @parent
    <title>{{ $title }}</title>
@endsection
@section('body')
    <form style="margin-bottom: 15px" class="col-3" method="POST" action="{{ route('user.registration') }}">
        @csrf
        <div class="form-group">
            <label for="email" class="col-form-label-lg">E-mail</label>
            <input id="email" class="form-control" name="email" autocomplete="off" type="text" value="" placeholder="Введите e-mail">
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="name" class="col-form-label-lg">Имя</label>
            <input id="name" class="form-control" name="name" autocomplete="off" type="text" value="" placeholder="Введите имя">
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="last_name" class="col-form-label-lg">Фамилия</label>
            <input id="last_name" class="form-control" name="last_name" autocomplete="off" type="text" value="" placeholder="Введите фамилию">
            @error('last_name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="password" class="col-form-label-lg">Пароль</label>
            <input id="password" class="form-control" name="password" autocomplete="off" type="password" value="" placeholder="Введите пароль">
            @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="password_confirmation" class="col-form-label-lg">Повторите пароль</label>
            <input id="password_confirmation" class="form-control" name="password_confirmation" autocomplete="off" type="password" value="" placeholder="Введите повторный пароль">
            @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group center">
            <button class="buttonSuccess btn btn-lg btn-primary" type="submit" name="send" value="1">Зарегистрироваться</button>
        </div>
    </form>
@endsection
