@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-2 d-flex">
                <div class="card w-100">
                    <div class="card-header">Reklama</div>
                    <div class="card-body">
                        <h4>I am an ad</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Ogłoszenia</div>
                    <div class="card-body">
                        <p>Witaj na moim blogu!</p>
                        <p>Cieszę się, że tu jesteś. Ten blog jest dedykowany światu gier, w którym podzielę się swoimi
                            spostrzeżeniami, recenzjami i ciekawostkami z tego fascynującego świata.</p>
                        <p>Przygotuj się na podróż pełną emocji, nowych odkryć i pasji, które łączą nas wszystkich jako
                            graczy. Będę regularnie aktualizować treści, więc miej oczy szeroko otwarte!</p>
                        <p>Zapraszam do zapoznania się z moimi wpisami i komentowania, abyśmy mogli wspólnie dzielić się
                            naszymi opiniami i doświadczeniami. Mam nadzieję, że znajdziesz tutaj wiele inspirujących treści
                            i że spędzisz tu miło czas.</p>
                        <p>Dziękuję jeszcze raz za odwiedziny i życzę udanej przygody w świecie gier!</p>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card">
                    <div class="card-header">Statystyki strony</div>
                    <div class="card-body">
                        <p>Odwiedzin: N/A</p>
                        <p>Postów: {{ App\Models\Post::count() }}</p>
                        <p>Komentarzy: {{ App\Models\Comment::count() }}</p>
                        <p>Wyświetleń postów: N/A</p>
                        <p>Użytkowników: {{ App\Models\User::count() }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-12" style="margin-top: 20px;">
                <div class="card">
                    <div class="card-header">Posty</div>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach ($posts as $post)
                                <li class="list-group-item">
                                    <a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a> -
                                    {{ $post->updated_at }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
