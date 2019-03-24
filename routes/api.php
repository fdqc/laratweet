<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Endpoint that returns an array with the last 10 comments of an account
Route::get('user/{userId}/last-comments','Api\UserCommentsController@show')->name('user/last-comments');
