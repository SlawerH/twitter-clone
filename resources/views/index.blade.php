@extends("layouts.app")

@section("title", "Home")

@section('content')
    @if (Auth::check())
        Welcome back, {{ Auth::user()->username }}

        @foreach ($tweets as $tweet)
            <div class="card mt-3">
                <div class="card-body">
                    <h5 class="card-title">From <u><a href="{{ route("profile", $tweet->user_id) }}" class="text-bold">{{ $tweet->username }}</a></u></h5>
                    <p class="text-muted">{{ $tweet->created_at }}</p>
                    <p class="card-text">{{ $tweet->content }}</p>
                    <div class="btn-group">
                        <a href="{{ route("view", $tweet->id) }}" class="btn btn-primary mr-2">View</a>
                        @if (Auth::id() === $tweet->user_id)
                            <form method="POST" action="{{ route("delete_tweet", $tweet->id) }}">
                                @csrf
                                @method("delete")
                                
                                <input type="submit" value="Delete" class="btn btn-danger">
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    @else
        Welcome! Log in to discover much more features!
    @endif
    
@endsection