@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card">
                <div class="card-header">Lista użytkowników</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Rola</th>
                                <th>Data rejestracji</th>
                                <th>Akcje</th>
                                <th>Zbanowany?</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td>{{ $user->created_at }}</td>
                                    <td>
                                        <form action="{{ route('users.management.ban', $user->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-warning">
                                                @if ($user->isBanned)
                                                    Odbanuj
                                                @else
                                                    Zbanuj
                                                @endif
                                            </button>

                                        </form>
                                        <div class="dropdown">
                                            <button class="btn btn-primary dropdown-toggle" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                Przydziel rolę
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#">Użytkownik</a></li>
                                                <li><a class="dropdown-item" href="#">Administrator</a></li>
                                            </ul>
                                        </div>
                                        <button class="btn btn-danger">Delete Account</button>
                                    </td>
                                    <td>
                                        @if ($user->isBanned)
                                            <strong>Tak</strong>
                                        @else
                                            Nie
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
