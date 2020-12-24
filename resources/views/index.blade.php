@extends("layouts.app")

@section("title", "Home")

@section('content')
    Welcome back, {{ Auth::user() ? Auth::user()->username : "Guest" }}
@endsection