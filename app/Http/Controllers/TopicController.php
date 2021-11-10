<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    private Topic $model;

    public function __construct()
    {
        return $this->model = new Topic();
    }

    public function index()
    {
        $data = $this->model->indexTopic();
        dd($data);
    }

    public function create()
    {
        $data = $this->model->createTopic();
        dd($data);
    }

    public function store(Request $request)
    {
        $data = $this->model->storeTopic($request);
        dd($data);
    }

    public function show($id)
    {
        $data = $this->model->showTopic($id);
        dd($data);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
