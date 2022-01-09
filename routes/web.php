<?php

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
    return view('welcome');
});

Route::get('/login','App\Http\Controllers\WebController@loginAction');

Route::post('/login','App\Http\Controllers\WebController@loginAction')->name('login');

Route::get('/list','App\Http\Controllers\WebController@userListAction')->name('userList');

Route::get('/add','App\Http\Controllers\WebController@addUserAction');
