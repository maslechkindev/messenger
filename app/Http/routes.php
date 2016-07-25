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
Route::post('/showajax', ['as' => 'showajax', 'uses' => 'MessageController@showajax']);
Route::post('/userdelete', ['as' => 'userdelete', 'uses' => 'UserController@delete']);
Route::post('/userupdate', ['as' => 'userupdate', 'uses' => 'UserController@update']);
Route::post('/usersshow', ['as' => 'usersshow', 'uses' => 'UserController@show']);
Route::post('/historydelete', ['as' => 'historydelete', 'uses' => 'MessageController@historydelete']);
