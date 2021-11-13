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

    /**
     * @throws ValidationException
     */
    public function store($request, $rules)
    {
        try {
            $data = $this->validate($request, $rules);
            return self::create($data);
        } catch (Exception $exception) {
            if ($exception instanceof ValidationException) {
                throw new ValidationException($exception->validator);
            }
        }
    }

    public function show($id)
    {
        return self::findOrFail($id);
    }

    public function index()
    {
        return self::all();
    }
}
