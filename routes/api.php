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

Route::get('/tasks', 'TaskController@index');       //URLパラメータ上では/api/taskis/～と表示される。
Route::post('/tasks', 'TaskController@store');   
Route::get('/tasks/{task}', 'TaskController@show');
Route::put('/tasks/{task}', 'TaskController@update');
Route::delete('/tasks/{task}', 'TaskController@destoroy');