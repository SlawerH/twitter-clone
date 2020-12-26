@extends("layouts.app")

@section("title", "Tweet")

@section('content')
    <div class="col-md-6 offset-md-3">
        <h2 class="text-center">Tweet</h2>
    
        <hr>
    
        <form method="POST">
            @csrf
    
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" id="content" name="content" required minlength="1" maxlength="180" rows="3"></textarea>
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Send</button>
            </div>
        </form>
    </div>
@endsection