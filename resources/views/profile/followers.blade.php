@extends("layouts.app")

@section("title", "Followers : " . $user->username)

@section('content')
    <a href="{{ url()->previous() }}">Back</a>

    <h2>{{ $user->username }}'s followers</h2>
    
    <p><b>{{ $followersCount }}</b> followers</p>
    
    <ul class="list-group">
        @foreach ($followers as $followerUser)
            <a href="{{ route("profile", $followerUser->follower_user->id) }}"><li class="list-group-item">{{ $followerUser->follower_user->username }}</li></a>
        @endforeach
    </ul>
@endsection