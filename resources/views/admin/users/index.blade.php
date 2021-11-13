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
                        <p class="mb-1">Пользователи</p>
                    </a>
                    @foreach($users as $user)
                        <div class="list-group-item list-group-item-action flex-column card-body">
                            <p class="mb-1">Имя: {{$user->name}}</p>
                            <p class="mb-1">Фамилия: {{$user->last_name}}</p>
                            <p class="mb-1">E-mail: {{$user->email}}</p>
                            @if($user->banned)
                                <p class="mb-1">Статус: Забанен</p>
                            @else
                                <p class="mb-1">Статус: Не забанен</p>
                                <div>
                                    <a style="margin: 5px" href="{{route('admin.ban', $user->id)}}" class="buttonSuccess btn btn-lg btn-primary" type="submit">Забанить</a>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
