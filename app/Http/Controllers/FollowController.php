<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Follow;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    public function follow(User $user) {
        if (Auth::id() === $user->id || Auth::user()->following($user)) {
            return abort(403);
        }

        Auth::user()->follow($user);

        return redirect()->route("profile", $user);
    }

    public function unfollow(User $user) {
        if (Auth::id() === $user->id || !Auth::user()->following($user)) {
            return abort(403);
        }

        Auth::user()->unfollow($user);

        return redirect()->route("profile", $user);
    }
}
