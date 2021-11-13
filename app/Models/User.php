<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class User extends BaseModel implements AuthenticatableContract, AuthorizableContract, CanResetPasswordContract
{
    use Authenticatable, Notifiable, Authorizable, CanResetPassword, MustVerifyEmail;

    public $timestamps = false;

    protected $fillable = [
        'email',
        'name',
        'last_name',
        'password',
        'role_id',
        'banned'
    ];

    protected $rules = [
        'email' => 'required|email|unique:users|max:50',
        'name' => 'required|max:50',
        'last_name' => 'required|max:50',
        'password' => 'required|confirmed|max:255'
    ];

    protected $rules_login = [
        'email' => 'required|email|exists:users,email|max:50',
        'password' => 'required|max:255'
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }

    public function registration($request)
    {
        if ($data = $this->store($request, $this->rules)) Auth::login($data);
        return redirect(route('home'));
    }

    public function login($request)
    {
        if (Auth::attempt($request->validate($this->rules_login))) return redirect()->intended(route('home'));
        return redirect(route('user.login'))->withErrors(['custom' => 'E-mail или пароль не верный']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('home'));
    }

    public function users()
    {
        $users = User::where('role_id', 1)->get();
        return view('admin.users.index', compact('users'))->with(['title' => 'Просмотр пользователей']);
    }

    // Eloquent

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
