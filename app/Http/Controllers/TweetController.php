<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TweetRequest;
use Illuminate\Support\Facades\Session;
use App\Models\Tweet;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class TweetController extends Controller
{
    public function index() {
        return view("tweet");
    }

    public function show(Tweet $tweet) {
        $user = $tweet->author()->first();

        $likes = Like::where("tweet_id", $tweet->id)->count();

        return view("view", compact("tweet", "user", "likes"));
    }

    public function store(TweetRequest $request) {
        $tweet = Tweet::create([
            "content" => $request->content,
            "user_id" => Auth::id()
        ]);

        return redirect()->route("index"); // TODO: redirect to tweet
    }

    public function destroy(Tweet $tweet) {
        if($tweet->user_id !== Auth::id()) {
            return abort(403);
        }

        $tweet = Tweet::find($tweet->id)->delete();

        Session::flash("alert-success", "Successfully deleted");

        return back();
    }
}
