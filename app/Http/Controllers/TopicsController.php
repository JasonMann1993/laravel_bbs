<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TopicsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth',['except' => ['index']]);
    }

    public function index(Request $request)
    {
        return view('topics.index');
    }
}
