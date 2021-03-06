<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;

class Reply extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'text',
        'user_id',
        'topic_id'
    ];

    protected $rules = [
        'text' => 'required|max:255',
        'user_id' => 'exists:users,id',
        'topic_id' => 'exists:topics,id'
    ];

    public function getCreatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d-m-Y h:i');
    }

    public function storeReply($request, $id)
    {
        if (!Auth::user()->banned) {
            if (Topic::find($id)->status->name == 'approved') {
                $this->store($request->merge(['user_id' => Auth::id(), 'topic_id' => $id]), $this->rules);
                return redirect(route('topic.show', $id));
            }
            return redirect(route('topic.show', $id))->withErrors(['text' => 'Тема не подтверждена']);
        }
        return redirect(route('topic.show', $id));
    }

    // Eloquent

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }
}
