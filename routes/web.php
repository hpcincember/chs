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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/leaders', 'LeaderController@index')->name('leader');
Route::get('/leaders/data', 'LeaderController@leaderData')->name('leader.data');

Route::get('/leader/edit/{leader}', 'LeaderController@edit');

Route::get('/roles','RoleController@index');
