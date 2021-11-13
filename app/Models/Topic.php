<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;

class Topic extends BaseModel
{
    protected $fillable = [
        'name',
        'text',
        'status_id'
    ];

    protected $rules = [
        'name' => 'required|max:50',
        'text' => 'required|max:1000'
    ];

    public function indexTopic()
    {
        $data = [
            'title' => 'Главная страница'
        ];
        $topics = $this->index()->where('status_id', '=', '1');
        return view('home', compact('topics'))->with($data);

    }

    public function storeTopic($request)
    {
        $this->store($request, $this->rules);
        return redirect(route('home'));
    }

    public function createTopic()
    {
        $data = [
            'title' => 'Создать тему'
        ];
        if (!Auth::user()->banned) {
            return view('topic.store')->with($data);
        }
        return redirect(route('home'));
    }

    public function showTopic($id)
    {
        $data = [
            'title' => "Просмотр темы: $id"
        ];

        $topic = $this->show($id);
        $replies = Reply::where('topic_id', $id)->get();
        return view('topic.show', compact('topic', 'replies'))->with($data);
    }

    // Eloquent

    public function status()
    {
        return $this->belongsTo(Activity::class);
    }
}
