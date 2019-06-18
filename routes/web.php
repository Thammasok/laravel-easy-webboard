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
    return view('welcome');
});

Route::get('/topic', 'TopicController@index');
Route::get('/topic/new', 'TopicController@newTopic');
Route::get('/topic/{id}', 'TopicController@detail');