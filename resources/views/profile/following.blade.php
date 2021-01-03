@extends("layouts.app")

@section("title", "Followers : " . $user->username)

@section('content')
    <a href="{{ url()->previous() }}">Back</a>

    <h2>{{ $user->username }}'s following</h2>
    
    <p><b>{{ $followingCount }}</b> following</p>
    
    <ul class="list-group">
        @foreach ($following as $followingUser)
            <a href="{{ route("profile", $followingUser->following_user->id) }}"><li class="list-group-item">{{ $followingUser->following_user->username }}</li></a>
        @endforeach
    </ul>
@endsection