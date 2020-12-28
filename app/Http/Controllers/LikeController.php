<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Tweet;
use App\Models\Like;

class LikeController extends Controller
{
    public function like(Tweet $tweet) {
        if (Auth::user()->liking($tweet)) {
            return abort(403);
        }

        Auth::user()->like($tweet);

        return back();
    }

    public function unlike(Tweet $tweet) {
        if (!Auth::user()->liking($tweet)) {
            return abort(403);
        }

        Auth::user()->unlike($tweet);

        return back();
    }
}
