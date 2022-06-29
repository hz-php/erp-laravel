<?php

use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});
Route::get('/registration', 'App\Http\Controllers\Auth\UsersController@create')->name('formregister');
Auth::routes();

Route::post('/register', 'App\Http\Controllers\Auth\UsersController@store')->name('register');
Route::get('/register/{id}', 'App\Http\Controllers\Auth\UsersController@edit')->name('edit');
Route::patch('/update/{id}', 'App\Http\Controllers\Auth\UsersController@update')->name('update');
Route::delete('/delete/{id}', 'App\Http\Controllers\Auth\UsersController@destroy')->name('delete');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

