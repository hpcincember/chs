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

Route::get('/sample', function () {
    return view('sample');
});

Route::get('users', function () {
    $user = App\User::paginate(5);
    return response()->json($user);
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/leaders', 'LeaderController@index')->name('leader');
Route::get('/leaders-data', 'LeaderController@leaderData')->name('leader.data');
Route::get('/leaders-page-data', 'LeaderController@leaderPageData')->name('leader.page-data');

Route::get('/leader/create', 'LeaderController@create')->name('leader.create');
Route::get('/leader/show/{leader}','LeaderController@show');
Route::post('/leader', 'LeaderController@store');
Route::get('/leader/edit/{leader}', 'LeaderController@edit');
Route::patch('/leader/{leader}','LeaderController@update');
Route::delete('/leader/{leader}','LeaderController@delete')->name('leader.delete');

Route::get('/roles','RoleController@index');
Route::get('/roles-data','RoleController@rolesData');
Route::get('/role/show/{role}','RoleController@show');
Route::post('/role','RoleController@store');
Route::delete('/role/{role}','RoleController@destroy');


Route::get('/modules-data','ModuleController@moduleData');
Route::post('/module','ModuleController@store');


Route::get('/networks','CellGroupController@getNetworks');



Route::get('/cellgroup-data','CellGroupController@getCellGroups');
Route::get('/cellgroup-page-data','CellGroupController@getCellGroupsPageData');
Route::get('/cellgroups','CellGroupController@index');
Route::get('/cellgroup/belongs-to-network/{network_id}','CellGroupController@getBelongsToNetwork');
Route::patch('/cellgroup/{cellgroup}','CellGroupController@update');
Route::post('/cellgroup','CellGroupController@store');
Route::delete('cellgroup/{cellgroup}','CellGroupController@delete');


Route::get('/attendance-sundays','AttendanceController@getSundays');
Route::get('/attendance','AttendanceController@index');
Route::get('/attendance-leaders','AttendanceController@getLeaderAttendance');
Route::get('/attendance-leaders-page-data','AttendanceController@getLeaderAttendancePageData');

Route::get('/attendance-search','AttendanceController@search');
Route::get('/attendance-searchByNetwork','AttendanceController@searchByNetwork');
