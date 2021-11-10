@extends('layouts.base')
@section('head')
    @parent
    <title>{{ $title }}</title>
@endsection
@section('body')
    <form class="col-3" method="POST" action="{{ route('user.registration') }}">
        @csrf
        <div class="form-group">
            <label for="email" class="col-form-label-lg">Email</label>
            <input id="email" class="form-control" name="email" autocomplete="off" type="text" value="" placeholder="Email">
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="name" class="col-form-label-lg">Name</label>
            <input id="name" class="form-control" name="name" autocomplete="off" type="text" value="" placeholder="Name">
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="last_name" class="col-form-label-lg">Last name</label>
            <input id="last_name" class="form-control" name="last_name" autocomplete="off" type="text" value="" placeholder="Last name">
            @error('last_name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="password" class="col-form-label-lg">Password</label>
            <input id="password" class="form-control" name="password" autocomplete="off" type="password" value="" placeholder="Password">
            @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="password_confirmation" class="col-form-label-lg">Repeat password</label>
            <input id="password_confirmation" class="form-control" name="password_confirmation" autocomplete="off" type="password" value="" placeholder="Repeat password">
            @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group center">
            <button class="buttonSuccess btn btn-lg btn-primary" type="submit" name="send" value="1">Registration</button>
        </div>
    </form>
@endsection
