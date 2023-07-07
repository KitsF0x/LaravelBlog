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
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection