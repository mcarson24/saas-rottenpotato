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

use App\Movie;
//
//Route::get('/', function () {
//	$movies = Movie::all();
////	dd($movies);
//    return view('welcome', compact('movies'));
//});

Route::get('/', 'MoviesController@index');

Route::resource('movies', 'MoviesController');


