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
  $data = [
    'comments' => App\Comment::latest()->paginate(15)
  ];

  return view('welcome',$data);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Comments routes
Route::post('comments/store','CommentsController@store')->name('comments/store');

// Profile routes
Route::get('profile/{id}','ProfilesController@show')->name('profile');
Route::get('profile/{id}/followers','ProfilesController@followers')->name('profile/followers');
Route::get('profile/{id}/follows','ProfilesController@follows')->name('profile/follows');

// Follow routes
Route::get('follow/{id}','FollowersController@follow')->name('follow');
Route::get('unfollow/{id}','FollowersController@unfollow')->name('unfollow');
