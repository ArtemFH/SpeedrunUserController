<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Validation\ValidatesRequests;


class Topic extends Model
{
    use HasFactory, ValidatesRequests;

    protected $fillable = [
        'name',
        'text',
        'status'
    ];

    protected $rules = [
        'text' => 'required|max:255',
        'name' => 'required|min:6|max:50'
    ];

    public function createTP($request)
    {
        try {
            return self::create($this->validate($request, $this->rules));
        } catch (\Exception $exception) {
            if ($exception instanceof ValidationException) {
                return response()->json($exception->validator->getMessageBag(), $exception->status);
            }
        }
    }
}
