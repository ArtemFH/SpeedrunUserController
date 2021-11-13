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
            @if(!$replies->isEmpty())
                <div class="card-body" style="padding: 5px 1.25rem">
                    <h6>Ответы к теме: {{$topic->name}}</h6>
                    @foreach($replies as $reply)
                        <div class="card-body" style="padding: 5px;">
                            <h7 class="card-title">Автор: {{$reply->user->name}}</h7>
                            <p class="card-text">Ответ: {{$reply->text}}</p>
                            <hr style="height: 1px; background-color: black">
                            <p class="card-text">Время: {{$reply->created_at}}</p>
                        </div>
                    @endforeach
                </div>
            @endif
            <form style="all: unset; width: auto; max-width: 100% !important;padding-top: 5px !important; padding: 1.25rem" class="card-body" method="POST" action="{{ route('send', $topic->id) }}">
                @csrf
                <div>
                    <div class="form-group">
                        <label for="text" class="col-form-label-lg">Ваш ответ</label>
                        <input id="text" class="form-control" name="text" autocomplete="off" type="text" value="" placeholder="Введите ваш ответ">
                        @error('text')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button class="buttonSuccess btn btn-lg btn-primary" type="submit" name="send" value="1">Оставить ответ</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
