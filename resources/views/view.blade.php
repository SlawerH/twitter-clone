@extends("layouts.app")

@section("title", "Tweet")

@section('content')
    <div class="card mt-3">
        <div class="card-body">
            <h5 class="card-title">From <u><a href="{{ route("profile", $user->id) }}" class="text-bold">{{ $user->username }}</a></u></h5>
            <p class="text-muted">{{ $tweet->created_at }}</p>
            <p class="card-text">{{ $tweet->content }}</p>
            @if (Auth::check() && Auth::id() === $user->id)
                <form method="POST" action="{{ route("delete_tweet", $tweet->id) }}">
                    @csrf
                    @method("delete")
                    
                    <input type="submit" value="Delete" class="btn btn-danger">
                </form>
            @endif
        </div>
    </div>

    <p class="mt-3">{{ $likes }} like(s)</p>

    @if (Auth::check())
    @if (Auth::user()->liking($tweet))
        <a href="{{ route("unlike", $tweet->id) }}" class="btn btn-danger">Unlike</a>
    @else
        <a href="{{ route("like", $tweet->id) }}" class="btn btn-success">Like</a>
    @endif
    @endif
@endsection