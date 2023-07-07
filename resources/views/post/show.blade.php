@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-body">
                        <h1>{{ $post->title }}</h1>
                        <p class="card-text">
                            Created at: <strong>{{ $post->created_at->format('d.m.Y H:i') }}</strong>
                            Last update: <strong>{{ $post->updated_at->format('d.m.Y H:i') }}</strong>
                        </p>
                        <hr>
                        <p class="card-text">{{ $post->content }}</p>
                        <div class="d-flex">
                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary mr-2">Wyświetl</a>
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning mr-2">Edytuj</a>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Usuń</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection