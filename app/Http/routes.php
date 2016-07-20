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

Route::auth();

Route::get('/', ['as' => 'chat', 'uses' => 'MessageController@show']);

Route::get('/chats', ['as' => 'chats', 'uses' => 'MessageController@showall']);
Route::post('/send', ['as' => 'send', 'uses' => 'MessageController@send']);
Route::get('/checkmessage', ['as' => 'checkmessage', 'uses' => 'MessageController@checkmessage']);
Route::get('/getmessage', ['as' => 'getmessage', 'uses' => 'MessageController@getmessage']);
Route::get('/updatemessage', ['as' => 'updatemessage', 'uses' => 'MessageController@updatemessage']);
Route::get('/checkmessage', ['as' => 'checkmessage', 'uses' => 'MessageController@checkmessage']);
Route::get('/checkmessage', ['as' => 'checkmessage', 'uses' => 'MessageController@checkmessage']);
