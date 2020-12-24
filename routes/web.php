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
    Route::post('/register', "RegisterController@store")->name("register");
    
    Route::get('/login', "LoginController@index")->name("login");
    Route::post('/login', "LoginController@store")->name("login");
});

Route::get('/logout', "LoginController@logout")->middleware("auth")->name("logout");