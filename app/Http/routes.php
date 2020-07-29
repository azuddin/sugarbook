<?php

use App\User;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    if(auth()->check())
        return redirect('/home');
    
    $users = App\User::all();
    return view('welcome', ['users' => $users]);
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('api/users', 'UserController@index');
Route::post('api/messages', 'MessageController@index');
Route::post('api/messages/send', 'MessageController@store');