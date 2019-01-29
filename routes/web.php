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

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth']], function (){
    Route::get('/', 'DashboardController@dashboard')->name('admin.index');
    Route::resource('/pays', 'PayController', ['as' => 'admin']);
    Route::post('permissions/get', ['as' => 'perms.get', 'uses' => 'PermissionsController@getPermissions']);
    Route::post('permissions/set', ['as' => 'perms.set', 'uses' => 'PermissionsController@setPermissions']);

    //   block users
    //    Route::resource('/users', 'UserController', ['as' => 'admin']);
    Route::get('users', ['as' => 'admin.users.index', 'uses' => 'UserController@index', 'middleware' => ['permission:user-list']]);
    Route::get('users/create', ['as' => 'admin.users.create', 'uses' => 'UserController@create', 'middleware' => ['permission:users-add']]);
    Route::post('users', ['as' => 'admin.users.store', 'uses' => 'UserController@store', 'middleware' => ['permission:users-add']]);
    Route::put('users/{user}', ['as' => 'admin.users.update', 'uses' => 'UserController@update', 'middleware' => ['permission:users-add']]);
    Route::get('users/{id}/edit', ['as' => 'admin.users.edit', 'uses' => 'UserController@edit', 'middleware' => ['permission:users-edit']]);
    Route::get('users/{id}', ['as' => 'admin.users.show', 'uses' => 'UserController@show', 'middleware' => ['permission:user-show']]);
    Route::get('users/destroy', ['as' => 'admin.users.destroy', 'uses' => 'UserController@destroy', 'middleware' => ['permission:user-delete']]);

    //    block settings
    //    Route::resource('/settings', 'SettingController', ['as' => 'admin']);
    Route::get('settings', ['as' => 'admin.settings.index', 'uses' => 'SettingController@index', 'middleware' => ['permission:settings-list']]);
    Route::get('settings/create', ['as' => 'admin.settings.create', 'uses' => 'SettingController@create', 'middleware' => ['permission:settings-add']]);
    Route::post('settings', ['as' => 'admin.settings.store', 'uses' => 'SettingController@store', 'middleware' => ['permission:settings-add']]);
    Route::put('settings/{user}', ['as' => 'admin.settings.update', 'uses' => 'SettingController@update', 'middleware' => ['permission:settings-add']]);
    Route::get('settings/{id}/edit', ['as' => 'admin.settings.edit', 'uses' => 'SettingController@edit', 'middleware' => ['permission:settings-edit']]);
    Route::get('settings/{id}', ['as' => 'admin.settings.show', 'uses' => 'SettingController@show', 'middleware' => ['permission:settings-show']]);
    Route::get('settings/destroy', ['as' => 'admin.settings.destroy', 'uses' => 'SettingController@destroy', 'middleware' => ['permission:settings-delete']]);

    Route::get('users/{id}/role', 'UserController@role', ['as' => 'admin'])->name('admin.users.role');
});



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', function (){
    return redirect()->route('admin.index');
})->name('home');
