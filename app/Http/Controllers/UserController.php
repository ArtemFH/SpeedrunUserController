<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
        $this->middleware('can:admin')->only('approved', 'rejected', 'indexAdmin', 'showAdmin');
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

    // Admin-logic

    public function approved($id)
    {
        Topic::find($id)->update(['status_id' => '1']);
        return redirect(route('admin.index'));
    }

    public function rejected($id)
    {
        Topic::find($id)->update(['status_id' => '3']);
        return redirect(route('admin.index'));
    }

    public function indexAdmin()
    {
        $topicsApp = Topic::where('status_id', 1)->get();
        $topicsEx = Topic::where('status_id', 2)->get();
        $topicsRej = Topic::where('status_id', 3)->get();
        return view('admin.index', compact('topicsApp', 'topicsEx', 'topicsRej'))->with(['title' => 'Просмотр тем']);
    }

    public function showAdmin($id)
    {
        $topic = Topic::findOrFail($id);
        return view('admin.show', compact('topic'))->with(['title' => "Просмотр темы: $id"]);
    }
}
