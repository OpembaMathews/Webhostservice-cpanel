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

// Authentication Routes...
Auth::routes();

Route::post('user/login', 'Auth\LoginController@loginUser');
Route::post('user/create', 'Auth\RegisterController@create');
Route::delete('user/delete', 'UserController@delete');

Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/dashboard', 'HomeController@index')->name('home');

// Admin  Routes
Route::group(['middleware' => ['admin']], function () {
    Route::get('admin/dashboard', 'AdminController@index')->name('admin.home');
    Route::get('admin/customers', 'AdminController@customers')->name('admin.customers');
    Route::get('delete/user/{id}', 'AdminController@deleteUser');
    Route::get('edit/user/{id}', 'AdminController@editUser');
    Route::get('admin/edit/user/{id}', 'AdminController@editUser');
    Route::post('admin/updateuser', 'AdminController@updateUser');
    Route::get('admin/vouchers','AdminController@vouchers');
    Route::view('admin/generateVoucher', 'admin.voucher.create');
    Route::post('admin/generateVoucher', 'AdminController@generate');
});


// User Routes
Route::get('profile','UserController@viewProfile');
Route::post('profileupdate', 'UserController@updateProfile');
Route::post('changepassword', 'UserController@changePassword');
Route::get('billing', 'UserController@billing');

// Domain Routes
Route::get('domain','DomainController@index');
Route::post('domain/create', 'DomainController@create');
Route::get('domain/show', 'DomainController@show');
Route::delete('domain/delete', 'DomainController@delete');

Route::get('drive','DriveController@index');
Route::post('drive/create', 'DriveController@create');
Route::get('drive/show', 'DriveController@show');
Route::delete('drive/delete', 'DriveController@delete');
Route::get('drive/file/{type}', 'DriveController@getDrive');
Route::get('drive/download/{file}', 'DriveController@download');
Route::post('drive/move/trash', 'DriveController@moveToTrash');
Route::post('drive/restore', 'DriveController@restore');
Route::delete('drive/delete', 'DriveController@delete');



