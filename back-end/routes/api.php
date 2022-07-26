<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//const UserController = require('../controllers/users.controller')

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

// by default all routes here will have /api added to it
// so test user one URL will be localhost/api/user


//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});


//Route::get('users', ['uses' => 'App\Http\Controllers\UserController@getUsers']);
//Route::get('users', ['uses' => 'App\Http\Controllers\UserController@getUsers']);

Route::group(['prefix'=>'users'], function() {
    Route::get('/', ['uses' => 'App\Http\Controllers\UserController@getUsers']);
    Route::get('random', ['uses' => 'App\Http\Controllers\UserController@getRandomUser']);
    Route::get('{id}', ['uses' => 'App\Http\Controllers\UserController@getUserById'])->where('id', '[0-9]+');
});