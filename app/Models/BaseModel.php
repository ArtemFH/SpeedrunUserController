<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Validation\ValidatesRequests;

class BaseModel extends Model
{
    use HasFactory, ValidatesRequests;

    public function store($request, $rules = null)
    {
        try {
            return self::create($this->validate($request, $rules));
        } catch (Exception $exception) {
            if ($exception instanceof ValidationException) {
                return throw new ValidationException($exception->validator);
            }
        }
    }

    public function show($id)
    {
        return self::findOrFail($id);
//        try {} catch (Exception $exception) {}
    }
}
