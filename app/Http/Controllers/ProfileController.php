<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Tweet;

class ProfileController extends Controller
{
    public function index(User $user) {
        $tweets = Tweet::select("*")->where("user_id", $user->id)->orderBy("id", "DESC")->get();

        return view("profile", compact("user", "tweets"));
    }
}
