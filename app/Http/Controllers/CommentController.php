<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        if(Auth::user()->role == UserRole::ADMIN || $comment->user_id == Auth::user()-> id) {
            $comment->delete();
            return redirect()->back();
        }
        abort(403);
    }
}
