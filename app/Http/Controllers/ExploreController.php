<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tweet;

class ExploreController extends Controller
{
    public function index() {
        $tweets = Tweet::select("tweets.*", "users.username")->join("users", "users.id", "=", "tweets.user_id")->orderBy("id", "DESC")->limit(30)->get();

        return view("explore", compact("tweets"));
    }
}
