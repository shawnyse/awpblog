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

//Route::get ('/', 'CommentController@index'); // Home page
Route::get ('/comment','CommentController@index'); // Main page
Route::get ('/comment/{comment}/', 'CommentController@show');//show page
Route::get ('/comment/{comment}/delete/', 'CommentController@destroy');//delete function
/*below is edit page*/
Route::get ('/comment/{comment}/edit/', 'CommentController@edit');
Route::post ('/comment/{comment}/edit/', 'CommentController@update');
/*below is add page*/
Route::get ('/add/', 'CommentController@create');
Route::post ('/add/', 'CommentController@store');
/*like&dislike function*/
Route::get ('/comment/{comment}/like/', 'LikesController@upVote');
Route::get ('/comment/{comment}/dislike/', 'LikesController@downVote');
/*search function*/
Route::post ('/search/', 'CommentController@result');

/*For Login system*/

Route::get('/', function () {
    return view('welcome');
}); // this is the default route

Auth::routes();


