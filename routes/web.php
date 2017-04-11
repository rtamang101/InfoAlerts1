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

Route::get('/signin', 'UserController@signin');

Route::get('/loginError', 'UserController@errorLogin')
			->name('loginError');

Route::get('/publish/{id}', 'UserController@publish');

Route::get('/admin/{id}', 'UserController@admin');

Route::get('/client/{id}', 'UserController@client');

Route::get('/archive/{id}', 'UserController@archive');

Route::post('/login','UserController@login');


Route::get('/registration_view/{id}','UserController@reg_view');

Route::post('/register/{id}','UserController@register');

Route::post('/send_message/{id}','UserController@send_message');

Route::get('/get_message/{dep_id}/{id}','UserController@get_message');

Route::post('get_message/{id}/send_responce','UserController@send_responce');

Route::get('/responseQuery/{id}','UserController@responseQuery');

Route::get('/response/{id}', 'UserController@sortResponse');

Route::get('logout', 'UserController@logout');

Route::post('send_response', 'UserController@send_response');
