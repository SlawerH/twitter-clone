@extends("layouts.app")

@section("title", "Register")

@section('content')
    <div class="col-md-6 offset-md-3">
        <h2 class="text-center">Login</h2>
    
        <hr>
    
        <form method="POST">
            @csrf
    
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
    
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required minlength="4" maxlength="32">
            </div>
    
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </form>
    </div>
@endsection