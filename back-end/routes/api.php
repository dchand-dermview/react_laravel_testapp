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

Route::group(
    [
        'prefix' => 'users',
        'middleware' => ['throttle:30,1'],
    ],
    static function () {
        Route::get('/', ['uses' => 'App\Http\Controllers\UserController@getUsers']);
        Route::post('/', ['uses' => 'App\Http\Controllers\UserController@createUser']);
        Route::patch('/', ['uses' => 'App\Http\Controllers\UserController@updateUser']);
        Route::get('random', ['uses' => 'App\Http\Controllers\UserController@getRandomUser']);
        Route::group(
            [
                'prefix' => '/{id}',
            ],
            static function () {
                Route::get('', ['uses' => 'App\Http\Controllers\UserController@getUserById'])->where('id', '[0-9]+');
                Route::delete('', ['uses' => 'App\Http\Controllers\UserController@deleteUser']);
            }
        );
    }
);


Route::group(
    [
        'prefix' => 'file',
        'middleware' => ['throttle:10,1'],
    ],
    function () {
        Route::get('/', ['uses' => 'App\Http\Controllers\FileController@getFile']);
        Route::get('/{id}', ['uses' => 'App\Http\Controllers\FileController@getFileById'])->where('id', '[0-9]+');
    });
