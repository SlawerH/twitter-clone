<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Tweet;
use App\Models\Follow;

class ProfileController extends Controller
{
    public function index(User $user) {
        $tweets = Tweet::select("*")->where("user_id", $user->id)->orderBy("id", "DESC")->get();

        $followersCount = Follow::where("followed_id", $user->id)->count();
        $followingCount = Follow::where("follower_id", $user->id)->count();

        return view("profile.index", compact("user", "tweets", "followersCount", "followingCount"));
    }

    public function followers(User $user) {
        $followers = Follow::where("followed_id", $user->id)->get();
        $followers->load("follower_user");

        $followersCount = $followers->count();

        return view("profile.followers", compact("user", "followers", "followersCount"));
    }

    public function following(User $user) {
        $following = Follow::where("follower_id", $user->id)->get();
        $following->load("following_user");

        $followingCount = $following->count();

        return view("profile.following", compact("user", "following", "followingCount"));
    }
}
