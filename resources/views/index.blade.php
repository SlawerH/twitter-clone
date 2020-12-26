@extends("layouts.app")

@section("title", "Home")

@section('content')
    @if (Auth::check())
        Welcome back, {{ Auth::user()->username }}

        @foreach ($tweets as $tweet)
            <div class="card mt-3">
                <div class="card-body">
                    <h5 class="card-title">From <u><a href="/profile/{{ $tweet->user_id }}" class="text-bold">{{ $tweet->username }}</a></u></h5>
                    <p class="text-muted">{{ $tweet->created_at }}</p>
                    <p class="card-text">{{ $tweet->content }}</p>
                </div>
            </div>
        @endforeach
    @else
        Welcome! Log in to discover much more features!
    @endif
    
@endsection