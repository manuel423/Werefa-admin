<?php

use App\Http\Controllers\sold_bus_ticket_apiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::apiResource('/api/businfo','sold_bus_ticket_apiController');
Route::apiResource('/api/movieinfo','movie_sold_ticket_apiController');
Route::apiResource('/api/stadiuminfo','stadium_sold_ticket_apiController');
Route::apiResource('/api/eventinfo','event_sold_ticket_apiController');
// Route::post('/businfo','sold_bus_ticket_apiController@store');
// Route::put('/updatebusinfo','sold_bus_ticket_apiController@store');
