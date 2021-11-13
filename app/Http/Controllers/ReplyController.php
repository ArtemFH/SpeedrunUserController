<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
    protected $model;

    public function __construct(Reply $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        //
    }


    public function store(Request $request, $id)
    {
        return $this->model->storeReply($request, $id);
    }

    public function show($id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
