<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
// General
Route::get('/', 'App\Http\Controllers\OrdersController@index')->where('any', '.*');

// Auth
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');

// Order
Route::get('/orders', 'App\Http\Controllers\OrdersController@index')->name('user.orders');
Route::get('/orders/create', 'App\Http\Controllers\OrdersController@create')->name('user.orders.create');
Route::post('/orders', 'App\Http\Controllers\OrdersController@store')->name('user.orders.store');
