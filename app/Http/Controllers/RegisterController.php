<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index() {
        return view("register");
    }

    public function store(RegisterRequest $req) {
        // Check if a user already uses the same email/username
        $unique = User::where("email", $req->email)->orWhere("username", $req->username)->first();

        if($unique !== null) {
            Session::flash("alert-danger", "Username or email already taken");
            
            return redirect()->route("register");
        }

        // Register the user into the database
        $user = User::create([
            "email" => $req->email,
            "username" => $req->username,
            "password" => Hash::make($req->password)
        ]);

        return redirect()->route("login");
    }
}
