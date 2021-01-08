<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', "IndexController@index")->name("index");


Route::middleware("guest")->group(function() {
    Route::get('/register', "RegisterController@index")->name("register");
    Route::post('/register', "RegisterController@store");
    
    Route::get('/login', "LoginController@index")->name("login");
    Route::post('/login', "LoginController@store");
});

Route::middleware("auth")->group(function() {
    Route::get('/logout', "LoginController@logout")->name("logout");

    Route::get("/tweet", "TweetController@index")->name("tweet");
    Route::post("/tweet", "TweetController@store");
    Route::delete("/tweet/{tweet}", "TweetController@destroy")->name("delete_tweet");

    Route::get("/follow/{user}", "FollowController@follow")->name("follow");
    Route::get("/unfollow/{user}", "FollowController@unfollow")->name("unfollow");

    Route::get("/like/{tweet}", "LikeController@like")->name("like");
    Route::get("/unlike/{tweet}", "LikeController@unlike")->name("unlike");
});

Route::get("/explore", "ExploreController@index")->name("explore");

Route::get("/view/{tweet}", "TweetController@show")->name("view");

Route::get("/profile/{user}", "ProfileController@index")->name("profile");
Route::get("/profile/{user}/followers", "ProfileController@followers")->name("profile.followers");
Route::get("/profile/{user}/following", "ProfileController@following")->name("profile.following");
