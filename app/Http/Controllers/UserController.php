<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    private User $model;

    public function __construct()
    {
        return $this->model = new User();
    }

    public function registration(Request $request)
    {
        $data = $this->model->registration($request);
        if ($data) {
            Auth::login($data);
            return redirect(route('home'));
        }
 
        return redirect(route('home'))->withErrors([
            'formError' => 'Error'
        ]);
    }

    public function registrationAvailability()
    {
        $data = array(
            'title' => 'Registration'
        );

        if (Auth::check()) {
            return redirect(route('home'));
        }
        return view('user.registration')->with($data);
    }

    public function login(Request $request)
    {
        if (Auth::attempt($request->only(['email', 'password']))) {
            return redirect()->intended(route('home'));
        }

        return redirect(route('user.login'))->withErrors([
            'email' => 'Error email or password'
        ]);
    }

    public function loginAvailability()
    {
        $data = array(
            'title' => 'Login'
        );

        if (Auth::check()) {
            return redirect(route('home'));
        }
        return view('user.login')->with($data);
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('home'));
    }

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
