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

Route::get('/test', ['as' => 'test', 'uses' => 'MessageController@test']);

Route::get('/chats', ['as' => 'chats', 'uses' => 'MessageController@showall']);
Route::post('/send', ['as' => 'send', 'uses' => 'MessageController@send']);
Route::post('/updatechat', ['as' => 'updatechat', 'uses' => 'MessageController@updatechat']);
