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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/tweets', 'TweetsController@index')->name('home');
    Route::post('/tweets', 'TweetsController@store');
    Route::post('/profiles/{user:username}/follow', 'FollowsController@store');
    Route::get(
        '/profiles/{user:username}/edit',
        'ProfilesController@edit'
        )->middleware('can:edit,user');
    Route::patch('/profiles/{user:username}', 'ProfilesController@update');
    Route::get('/explore', 'ExploreController');
});


Route::get('/profiles/{user:username}', 'ProfilesController@show')->name('profile');

Auth::routes();
