@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h1>Lista postów</h1>
                <hr>

                @foreach($posts as $post)
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text">{{ Str::limit($post->content, $str_limit, "...") }}</p>
                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary mr-2">Show</a>
                        </div>
                    </div>
                @endforeach
                <a href="{{ route('posts.create') }}" class="btn btn-primary mr-2">Add new post</a>
            </div>

        </div>
    </div>
@endsection