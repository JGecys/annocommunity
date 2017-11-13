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

Route::get('/', 'MainController@index');

Route::get('/join', 'CommunityController@joinCommunity');

Route::get('/join/{invite}', 'CommunityController@joinCommunity');

Route::post('/create', 'CommunityController@create');

Route::get('/home', 'MainController@index');

Route::post('/save', 'MainController@save');

Route::post('/restore', 'MainController@restore');

Route::get('/logout', function (\Illuminate\Http\Request $request) {
    $request->session()->flush();
    return redirect('/');
});

Route::get('/session', function (\Illuminate\Http\Request $request) {
    return $request->session()->all();
});

Route::get('/community', 'CommunityController@index');

Route::middleware(['community'])->group(function () {

    Route::prefix('community')->group(function () {

        Route::get('/{community}', 'CommunityController@community');

        Route::post('/{community}/invite', 'CommunityController@invite');

        Route::get('/{community}/leave', 'CommunityController@leave');

        Route::prefix('/{community}/post')->group(function () {

            Route::get('/', 'PostController@posts');

            Route::get('/{post}', 'PostController@post');

            Route::post('/{post}/comment', 'PostController@comment');

        });

    });

});