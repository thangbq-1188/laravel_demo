<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', 'PassportController@login');
Route::post('register', 'PassportController@register');
Route::get('user', 'PassportController@details')->middleware('auth:api');

Route::group(['namespace' => 'Api', 'prefix' => 'v1'], function () {
    Route::apiResource('posts', 'V1\PostsController');
});
