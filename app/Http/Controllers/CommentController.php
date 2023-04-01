<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentStoreRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(CommentStoreRequest $request){
        $validated = $request->validated();
        $validated['author_id'] = auth()->user()->id;
        
        Comment::query()->create($validated);
        return redirect()->back();
    }
}
