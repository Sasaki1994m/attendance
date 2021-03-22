<?php

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

Route::get('/list', 'TimestampsController@list' )->name('list');
Route::get('/timestamps.create', 'TimestampsController@create')->name('timestamps.create');
Route::post('/timestamps.store', 'TimestampsController@store')->name('timestamps.store');
Route::post('/timestamps.update', 'TimestampsController@update')->name('timestamps.update');

//勤務表をCSVで取り込むためのルーティング
Route::get('/inport','AttendancesController@index');
Route::post('/inport','AttendancesController@update');

//ログイン関連のルーティング
Auth::routes([
    'register' => false //ユーザ登録機能をオフにする（用意されている登録機能の停止）
]);
Route::get('/home', 'HomeController@index')->name('home');

// 全ユーザ
Route::group(['middleware' => ['auth','can:user-higher']], function(){
// ユーザ一覧
    Route::get('/account','AccountController@index')->name('account.index');
});

// 管理者以上
Route::group(['middleware' => ['auth', 'can:admin-higher']],function(){
    // ユーザ登録
    Route::get('account/regist','AccountController@regist')->name('account.regist');
    Route::post('account/regist','AccountController@createData')->name('account.regist');

    // ユーザ編集
    Route::get('account/edit/{user_id}','AccountController@edit')->name('account.edit');
    Route::post('account/edit/{user_id}','AccountController@updateData')->name('account.edit');

    // ユーザ削除
    Route::post('/account/delete/{user_id}','AccountController@deleteData');
});

// システム管理者のみ
Route::group(['middleware' => ['auth', 'can:system-only']],function(){

});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
