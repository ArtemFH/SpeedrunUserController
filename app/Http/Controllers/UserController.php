<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function registration(Request $request)
    {
        return $this->model->registration($request);
    }

    public function login(Request $request)
    {
        return $this->model->login($request);
    }

    public function logout()
    {
        return $this->model->logout();
    }

    public function registrationAvailability()
    {
        $data = [
            'title' => 'Регистрация'
        ];

        if (Auth::check()) {
            return redirect(route('home'));
        }
        return view('user.registration')->with($data);
    }

    public function loginAvailability()
    {
        $data = [
            'title' => 'Авторизация'
        ];

        if (Auth::check()) {
            return redirect(route('home'));
        }
        return view('user.login')->with($data);
    }

    public function index()
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
