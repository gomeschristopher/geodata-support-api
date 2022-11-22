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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => 'App\Http\Controllers'], function () {

    Route::group(['prefix' => 'tasks'], function () {
        Route::get('status', 'SupportTaskStatusController@index');
        Route::get('', 'SupportTaskController@index');
        Route::post('', 'SupportTaskController@store');
        Route::put('{id}', 'SupportTaskController@update');
        Route::delete('{id}', 'SupportTaskController@destroy');
    });

    Route::group(['prefix' => 'users'], function () {
        Route::get('', 'UserController@index');
        Route::post('', 'UserController@store');
        Route::put('{id}', 'UserController@update');
        Route::delete('{id}', 'UserController@destroy');
    });
});
