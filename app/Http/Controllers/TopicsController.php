<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;

class TopicsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth',['except' => ['index']]);
    }

    public function index()
    {
        $topics =  Topic::with('user', 'category')->paginate(20);
        return view('topics.index',compact('topics'));
    }

    public function create()
    {
        return view('topics.create');
    }
}
