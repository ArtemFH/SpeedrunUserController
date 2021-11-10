<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Hash;

class User extends BaseModel
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'email',
        'name',
        'last_name',
        'password',
        'banned'
    ];

    protected $rules = [
        'email' => 'required|email|max:50',
        'name' => 'required|max:50',
        'last_name' => 'required|max:50',
        'password' => 'required|confirmed|max:255'
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }

    public function registration($request)
    {
        return self::store($request, $this->rules);
    }
}
