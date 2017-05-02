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

Route::get('/admin/login', 'UserController@create')->name('admin_login');
Route::post('/admin/login', 'UserController@store')->name('admin_login');
Route::group(array('prefix' => 'admin', 'middleware' => 'auth'), function ()
{
    Route::get('/community', 'CommunityController@index')->name('community_index');
});