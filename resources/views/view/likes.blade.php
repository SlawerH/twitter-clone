@extends("layouts.app")

@section("title", "Likes")

@section('content')    
    <a href="{{ url()->previous() }}">Back</a>

    <h2>Tweet #{{ $tweet->id }} likes : {{ $likes->count() }}</h2>

    <ul class="list-group">
        @foreach ($likes as $like)
            <a href="{{ route("profile", $like->user_id) }}"><li class="list-group-item">{{ $like->username }}</li></a>
        @endforeach
    </ul>
@endsection