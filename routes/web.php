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

Route::get('/', 'PagesController@getIndex');
Route::get('/pairings','PagesController@getPairings');

Route::get('/identity','IdentityController@index');
Route::post('/identity','IdentityController@store');
Route::get('/auto_pop','IdentityController@autoPop');

Route::get('/make_key','PickController@keyIndex');
Route::post('/make_key','PickController@createKey');
Route::get('/make_picks','PickController@pickIndex');
Route::post('/make_picks','PickController@pickCreate');