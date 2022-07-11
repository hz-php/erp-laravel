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
    if (!\Auth::check() ) {
        return view('auth.login');
    } else {
        return redirect(\route('home'));
    }
});
Route::get('/registration', 'App\Http\Controllers\Auth\UsersController@create')->name('formregister');
Route::get('/city-add', 'App\Http\Controllers\CityController@create')->name('form_city');
Route::get('/city', 'App\Http\Controllers\CityController@index')->name('index_city');
Auth::routes();

Route::post('/register', 'App\Http\Controllers\Auth\UsersController@store')->name('register');
Route::post('/city_store', 'App\Http\Controllers\CityController@store')->name('city_store');
Route::post('/worker_store', 'App\Http\Controllers\Work\WorkerController@store')->name('worker_store');


Route::get('/edit/{id}', 'App\Http\Controllers\Auth\UsersController@edit')->name('edit');
Route::get('/edit_worker/{id}', 'App\Http\Controllers\Work\WorkerController@edit')->name('edit_worker');

Route::get('/show/{id}', 'App\Http\Controllers\Auth\UsersController@show')->name('show');
Route::get('/worker_show/{id}', 'App\Http\Controllers\Work\WorkerController@show')->name('worker_show');

Route::patch('/update/{id}', 'App\Http\Controllers\Auth\UsersController@update')->name('update');
Route::patch('/update/{id}', 'App\Http\Controllers\Work\WorkerController@update')->name('worker_update');

Route::delete('/delete/{id}', 'App\Http\Controllers\Auth\UsersController@destroy')->name('delete');
Route::delete('/delete_city/{id}', 'App\Http\Controllers\CityController@destroy')->name('delete_city');
Route::delete('/delete_worker/{id}', 'App\Http\Controllers\Work\WorkerController@destroy')->name('delete_worker');

Route::get('worker/', 'App\Http\Controllers\Work\WorkerController@index')->name('worker_show');
Route::get('worker_form/', 'App\Http\Controllers\Work\WorkerController@create')->name('worker_form');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

