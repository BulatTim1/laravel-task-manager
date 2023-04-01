<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {
        if (Auth::user()->role == 'admin') {
            return view('admin.index', 
                [
                    'tasks' => Task::query()
                        ->where('is_completed', false)->get()
                        ->groupBy('author_id')
                ]
            );
        }
        return view('index', 
        ['tasks' => Task::query()->where('is_completed', false)->
        where('author_id', Auth::user()->id)->get()]);
    }
}
