@extends('layouts.base')
@section('head')
    @parent
    <title>{{ $title }}</title>
@endsection
@section('topic')
    <div class="container">
        <div class="row pb-4">
            <div class="col">
                <div class="list-group mt-3">
                    <a href="" class="headNomination list-group-item list-group-item-action flex-column align-items-start">
                        <p class="mb-1">Темы ожидающие проверку</p>
                    </a>
                    @foreach($topicsEx as $topic)
                        <a href="{{ route('admin.show', $topic->id) }}" class="list-group-item list-group-item-action flex-column align-items-start">
                            <p class="mb-1">Название: {{$topic->name}}</p>
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="col">
                <div class="list-group mt-3">
                    <a href="" class="headNomination list-group-item list-group-item-action flex-column align-items-start">
                        <p class="mb-1">Темы прошедшие проверку</p>
                    </a>
                    @foreach($topicsApp as $topic)
                        <a href="{{ route('admin.show', $topic->id) }}" class="list-group-item list-group-item-action flex-column align-items-start">
                            <p class="mb-1">Название: {{$topic->name}}</p>
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="col">
                <div class="list-group mt-3">
                    <a href="" class="headNomination list-group-item list-group-item-action flex-column align-items-start">
                        <p class="mb-1">Отклоненные темы</p>
                    </a>
                    @foreach($topicsRej as $topic)
                        <a href="{{ route('admin.show', $topic->id) }}" class="list-group-item list-group-item-action flex-column align-items-start">
                            <p class="mb-1">Название: {{$topic->name}}</p>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
