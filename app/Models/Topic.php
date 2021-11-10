<?php

namespace App\Models;

class Topic extends BaseModel
{
    protected $fillable = [
        'name',
        'text',
        'status'
    ];

    protected $rules = [
        'text' => 'required|max:255',
        'name' => 'required|min:6|max:50'
    ];

    public function indexTopic()
    {
        return $this->index();
    }

    public function storeTopic($request)
    {
        return $this->store($request, $this->rules);
    }

    public function showTopic($id)
    {
        return $this->show($id);
    }
}
