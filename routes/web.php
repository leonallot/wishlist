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
//login in credentials
Route::get('/api/register','RegisterController@create');//->middleware('deny');
Route::post('/api/register','RegisterController@store');
Route::get('/api/login','SessionsController@create' );//->middleware('deny');
Route::get('/api/logout','SessionsController@destroy');
Route::post('/api/login','SessionsController@store');//->middleware('deny');

//wishlist main functions
Route::get('/api/wish', 'WishesController@index');
Route::get('/api/wish/create','WishesController@create');
Route::post('/api/wish','WishesController@store');
Route::get('/api/wish/delete/{id}','WishesController@show');
Route::get('/api/wish/{id}','WishesController@edit');
Route::put('/api/wish/{id}','WishesController@update');
Route::patch('/api/wish/{id}','WishesController@update');
Route::delete('/api/wish/{id}','WishesController@destroy');

/*
Route::group(['middleware'=>'grant'], function(){
	Route::get('/api/wish/create','WishesController@create');
	Route::post('/api/wish','WishesController@store');
	Route::get('/api/wish/{id}','WishesController@edit');
	Route::put('/api/wish/{id}','WishesController@update');
	Route::get('/api/wish/delete/{id}','WishesController@show');
	Route::delete('/api/wish/{id}','WishesController@destroy');
});
