<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    protected $model;

    public function __construct(Topic $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        return $this->model->indexTopic();
    }

    public function create()
    {
        return $this->model->createTopic();
    }

    public function store(Request $request)
    {
        return $this->model->storeTopic($request);
    }

    public function show($id)
    {
        return $this->model->showTopic($id);
    }

    public function destroy($id)
    {
        //
    }
}
