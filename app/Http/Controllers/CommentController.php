<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request) 
    {
        $comment = new Comment();
        $comment->fill($request->all());
        $comment->save();
        return redirect()->back();
    }

    public function destroy(int $id) 
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();
        return redirect()->back();
    }
}
