<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Tweet;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class IndexController extends Controller
{
    public function index() {
        $tweets = null;
        
        if(Auth::check()) {
            $tweets = cache()->remember('tweets_' . Auth::id(), 5, function () {
                $followingList = Auth::user()->followingList();
    
                $followingList = $followingList->pluck("followed_id");
                $followingList[] = Auth::id();

                return $tweets = DB::table("tweets")
                    ->select("tweets.*", "users.username")
                    ->join("users", "users.id", "=", "tweets.user_id")
                    ->orderBy("tweets.id", "DESC")
                    ->whereIn("tweets.user_id", $followingList)->latest()
                    ->get();
            });
            
        }

        return view("index", compact("tweets"));
    }
}
