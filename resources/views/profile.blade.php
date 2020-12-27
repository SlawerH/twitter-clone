@extends("layouts.app")

@section("title", $user->username)

@section('content')
    <h2>{{ $user->username }}</h2>
    
    @if (Auth::id() !== $user->id)
        @if (Auth::user()->following($user))
            <a href="{{ route("unfollow", $user->id) }}" class="btn btn-danger">Unfollow</a>
        @else  
            <a href="{{ route("follow", $user->id) }}" class="btn btn-primary">Follow</a>
        @endif
    @endif

    @foreach ($tweets as $tweet)
    <div class="card mt-3">
        <div class="card-body">
            <h5 class="card-title">From <u><a href="{{ route("profile", $tweet->user_id) }}" class="text-bold">{{ $user->username }}</a></u></h5>
            <p class="text-muted">{{ $tweet->created_at }}</p>
            <p class="card-text">{{ $tweet->content }}</p>
            @if (Auth::id() === $user->id)
                <form method="POST" action="{{ route("delete_tweet", $tweet->id) }}">
                    @csrf
                    @method("delete")
                    
                    <input type="submit" value="Delete" class="btn btn-danger">
                </form>
            @endif
        </div>
    </div>
@endforeach
@endsection