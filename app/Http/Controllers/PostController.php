<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    const CONTENT_STRING_CHAR_LIMIT = 500;
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('post.index', [
            "posts" => Post::all(),
            "str_limit" => self::CONTENT_STRING_CHAR_LIMIT
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $post = new Post();
        $post->fill($request->all());
        $post->save();
        return redirect(route('posts.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('post.show', [
            "post" => Post::findOrFail($id),
            "comments" => Comment::where('post_id', $id)->orderBy('created_at', 'DESC')->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $dream = Post::findOrFail($id);
        return view('post.edit', [
            "post" => $dream
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $post = Post::findOrFail($id);
        $post->title = $request->input('title');
        $post->content = $request->input('content');
    
        $post->save();
        return redirect(route("posts.index"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        $commentsOfThePost = Comment::where('post_id', $id);
        $commentsOfThePost->delete();

        return redirect(route("posts.index"));
    }
}
