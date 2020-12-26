<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TweetRequest;

use App\Models\Tweet;
use Illuminate\Support\Facades\Auth;

class TweetController extends Controller
{
    public function index() {
        return view("tweet");
    }

    public function store(TweetRequest $request) {
        $tweet = Tweet::create([
            "content" => $request->content,
            "user_id" => Auth::id()
        ]);

        return redirect()->route("index");
    }
}
