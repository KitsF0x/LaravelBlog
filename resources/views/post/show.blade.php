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
                            <div class="d-flex">
                                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning mr-2">Edytuj</a>
                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Usuń</button>
                                </form>
                            </div>
                        </p>

                        <hr>
                        <p class="card-text">{{ $post->content }}</p>


                        @auth
                            <div class="card border">
                                <div class="card-body">
                                    <form action="">
                                        <div class="mb-3 row">
                                            <label for="comment" class="col-md-4 col-form-label text-md-end">Zamieść
                                                komentarz</label>
                                            <div class="col-md-6">
                                                <textarea id="comment" type="text" class="form-control @error('comment') is-invalid @enderror" name="comment"
                                                    required autocomplete="comment" autofocus></textarea>
                                                @error('comment')
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
                            </div>
                        @endauth
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
