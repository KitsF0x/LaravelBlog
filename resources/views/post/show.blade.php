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
                            @can('isAdmin')
                            <div class="d-flex">
                                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning mr-2">Edytuj</a>
                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Usuń</button>
                                </form>
                            </div>
                        @endcan()
                        </p>

                        <hr>
                        <p class="card-text">{{ $post->content }}</p>
                        @can('isUserNotBanned')
                            <div class="card border">
                                <div class="card-body">
                                    <form action="{{ route('comments.store') }}" method="POST">
                                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                                        <input type="hidden" name="user_id" value="{{ Auth::id() }}">

                                        @csrf
                                        <div class="mb-3 row">
                                            <label for="content" class="col-md-4 col-form-label text-md-end">Zamieść
                                                komentarz</label>
                                            <div class="col-md-6">
                                                <textarea id="content" type="text" class="form-control @error('content') is-invalid @enderror" name="content"
                                                    required autocomplete="content" autofocus></textarea>
                                                @error('content')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-0 row">
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                    Zamieść
                                                </button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                                <hr>
                                <div class="mb-3 row">
                                    <label for="rating" class="col-md-5 col-form-label text-md-end">Twoja ocena</label>
                                    <div class="col-md-6">
                                        <form action="{{ route('ratings.store') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                            <div class="btn-group" role="group" aria-label="Post Rating">
                                                @foreach (range(1, 5) as $ratingValue)
                                                    @php
                                                        $selectedClass = $user_rating_value && $user_rating_value == $ratingValue ? 'btn-primary' : 'btn-outline-primary';
                                                    @endphp
                                                    <button type="submit" name="rating_value" value="{{ $ratingValue }}"
                                                        class="btn {{ $selectedClass }}">{{ $ratingValue }}</button>
                                                @endforeach
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        @endcan
                        <br>
                        @foreach ($comments as $comment)
                            <div class="card mb-3">
                                @php
                                    $user = \App\Models\User::find($comment->user_id);
                                @endphp

                                <p>
                                    <strong>{{ $user->name }}</strong>
                                    <i>{{ $comment->created_at }}</i>
                                </p>
                                <p>{{ $comment->content }}</p>
                                @auth
                                    @if (Auth::id() === $comment->user_id || $is_current_user_admin)
                                        <form action="{{ route('comments.destroy', $comment->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Usuń komentarz</button>
                                        </form>
                                    @endif
                                @endauth
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
