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
// Route::get('/', 'AuthController@comingSoon');
Route::get('login', 'AuthController@showLoginForm')->name('login');
Route::post('login', 'AuthController@login');
Route::get('logout', 'AuthController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'AuthController@showRegistrationForm')->name('register');
Route::post('register', 'AuthController@register');

// Password Reset Routes...
Route::get('password/reset', 'AuthController@getRemind')->name('password.request');
Route::post('password/email', 'AuthController@postRemind')->name('password.email');
Route::get('password/reset/{token}', 'AuthController@getReset')->name('password.reset');
Route::post('password/reset', 'AuthController@postReset')->name('password.request');


// Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('home');

// Admin  Routes
Route::group(['middleware' => ['admin']], function () {
    Route::get('admin/dashboard', 'AdminController@index')->name('admin.home');
    Route::get('admin/customers', 'AdminController@customers')->name('admin.customers');
    Route::get('delete/user/{id}', 'AdminController@deleteUser');
    Route::get('edit/user/{id}', 'AdminController@editUser');
    Route::post('admin/updateuser', 'AdminController@updateUser');
    Route::get('admin/vouchers','AdminController@vouchers');
    Route::view('admin/generateVoucher', 'admin.voucher.create');
    Route::post('admin/generateVoucher', 'AdminController@generate');
});



