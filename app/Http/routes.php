<?php


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



Route::get('login', 'LoginController@login');
Route::post('doLogin', 'LoginController@doLogin');
Route::get('logout', 'LoginController@logout');

//这里是需要鉴权为sa的
Route::group(['middleware' => 'auth:sa'], function (){
    Route::get('/', function () {

        return view('sa.sa', ['users' => 123]);
    });

    Route::get('sa/home', function () {
        return view('sa.sa', ['admins'=>123]);
    });

});


//这里是需要鉴权为user的
Route::group(['middleware' => 'auth:user'], function (){

});

//这里是需要鉴权为admin的
Route::group(['middleware' => 'auth:admin'], function () {

});