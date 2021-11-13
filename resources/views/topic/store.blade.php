@extends('layouts.base')
@section('head')
    @parent
    <title>{{ $title }}</title>
@endsection
@section('body')
    <form class="col-3" method="POST" action="{{ route('topic.store') }}">
        @csrf
        <div class="form-group">
            <label for="name" class="col-form-label-lg">Название</label>
            <input id="name" class="form-control" name="name" autocomplete="off" type="text" value="" placeholder="Введите название">
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="text" class="col-form-label-lg">Текст</label>
            <textarea id="text" class="form-control" name="text" placeholder="Введите текст" style="background-color: #fff1d8"></textarea>
            @error('text')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group center">
            <button class="buttonSuccess btn btn-lg btn-primary" type="submit" name="send" value="1">Создать тему</button>
        </div>
    </form>
@endsection
