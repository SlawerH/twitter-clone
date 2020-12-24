<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index() {
        return view("login");
    }

    public function store(LoginRequest $req) {
        // Check if the user exists

        // $user = User::where([
        //     ["email", $req->email],
        // ])->first();

        if(Auth::attempt($req->only(["email", "password"]))) {
            return redirect()->route("index");
        } else {
            Session::flash("alert-danger", "Invalid email or password");
            
            return redirect()->route("login");
        }

    }

    public function logout(Request $req) {
        Auth::logout();

        $req->session()->invalidate();

        $req->session()->regenerateToken();

        return redirect()->route("index");
    }
}
