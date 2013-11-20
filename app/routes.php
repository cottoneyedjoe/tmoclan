<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

//User Registration, Login, Updating, Removing etc.
Route::resource('user', 'UserController');

Route::get('war/search', 'WarController@search');
Route::resource('war', 'WarController');

Route::get('chat/show_all', function()
{
	echo json_encode($chat);
});
Route::resource('chat', 'ChatController');

View::composer(array('includes.chat'), function($view)
{
    $chat = DB::select(DB::raw("SELECT *
								FROM chat
								INNER JOIN users
								WHERE chat.user_id = users.id
								ORDER BY chat.id DESC 
								LIMIT 6"));
    $view->with('chat', $chat);
});