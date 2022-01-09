<?php

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


Route::post('/login','App\Http\Controllers\Api\V1\UserController@loginAction')->name('apiLogin');

Route::middleware('auth:api')->get('/list', 'App\Http\Controllers\Api\V1\UserController@userListAction');

Route::middleware('auth:api')->put('/addUser', 'App\Http\Controllers\Api\V1\UserController@addAction')->name('addUser');




