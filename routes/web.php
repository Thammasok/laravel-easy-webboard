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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'TopicController@index');
Route::get('/new', 'TopicController@newTopic');
Route::get('/{id}', 'TopicController@detail');

Route::post('/new', 'TopicController@create');
Route::post('/reply', 'TopicController@edit');