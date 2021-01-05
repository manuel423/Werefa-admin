<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('login');
});

Route::post('/login', 'LoginController@index');
Route::get('/logout', 'LoginController@logout');
Route::get('/addschedule', 'MoviesController@index');
Route::get('/sellticket', 'MoviesController@show');
Route::get('/movieinfo', 'CinemaplaceController@index');
Route::post('/checkmovie', 'MovieinfoController@show');
Route::post('/add', 'MovieinfoController@insert');
Route::post('/delete', 'MovieinfoController@destroy');
Route::post('/addseat', 'CinemaplaceController@insert');
Route::post('/cinemmap', 'MovieinfoController@index');
Route::get('/home', 'CinemaplaceController@show');
