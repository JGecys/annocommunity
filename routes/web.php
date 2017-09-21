<?php

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

Route::get('/', function () {
    return view('landing');
});

Route::get('/join', 'MainController@testJoin');

Route::get('/home', 'MainController@index');

Route::get('/logout', function () {
    Session::flush();
    return redirect('/');
});

Route::middleware(['community'])->group(function (){

    Route::prefix('community')->group(function (){

        Route::get('/', 'CommunityController@index');

        Route::get('/{community}', 'CommunityController@community');

        Route::get('/{community}/post/{post}', 'CommunityController@post');

    });

});