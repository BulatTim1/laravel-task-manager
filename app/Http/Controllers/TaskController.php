<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskStoreRequest;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function show(Task $task)
    {
        return view('task', ['task' => $task]);
    }

    public function create()
    {
        return view('create');
    }

    public function edit()
    {
        return redirect()->route('index');
    }

    public function delete(){
        return redirect()->route('index');
    }

    public function store(TaskStoreRequest $request){
        $validated = $request->validated();
        $validated['author_id'] = auth()->user()->id;
        $validated['description'] = "";

        Task::query()->create($validated);
        return redirect()->route('index');
    }
}
