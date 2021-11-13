@extends('layouts.base')
@section('head')
    @parent
    <title>{{ $title }}</title>
@endsection
@section('body')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Название: {{$topic->name}}</h5>
                <p class="card-text">Описание: {{$topic->text}}</p>
            </div>
            @if($topic->status->name == 'except')
                <div class="center">
                    <a style="margin: 5px" href="{{route('admin.approved', $topic->id)}}" class="buttonSuccess btn btn-lg btn-primary" type="submit">Подтвердить</a>
                    <a style="margin: 5px" href="{{route('admin.rejected', $topic->id)}}" class="buttonSuccess btn btn-lg btn-primary" type="submit">Отклонить</a>
                </div>
            @endif
        </div>
    </div>
@endsection
