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
Route::delete('/admin/loginout', 'UserController@destroy')->name('admin_login_out');

Route::get('/president_search', 'UserController@president_search')->name('president_search');

Route::group(array('prefix' => 'admin', 'middleware' => 'auth'), function ()
{
    Route::get('/community', 'CommunityController@index')->name('community_index')->middleware('can:view,App\Models\Community');
    Route::get('/community/create', 'CommunityController@create')->name('community_create')->middleware('can:create,App\Models\Community');
    Route::post('/community/create', 'CommunityController@store')->name('community_create')->middleware('can:create,App\Models\Community');
    Route::get('/community/{communityId}/edit', 'CommunityController@edit')->name('community_edit')->middleware('can:create,App\Models\Community');
    Route::put('/community/{communityId}/edit', 'CommunityController@update')->name('community_edit')->middleware('can:create,App\Models\Community');
});