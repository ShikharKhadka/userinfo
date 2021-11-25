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

Route::get('/list', 'App\Http\Controllers\User@list');
Route::get('/hello', 'App\Http\Controllers\Hello@hello');
Route::get('/show', 'App\Http\Controllers\JpgController@show');
Route::post('/register', 'App\Http\Controllers\LoginController@register');
Route::post('/login', 'App\Http\Controllers\LoginController@login');
Route::get('/userTransaction', 'App\Http\Controllers\TransactionController@userTransaction');


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
