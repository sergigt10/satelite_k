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
    return view('welcome');
});

// Route::get('/home', [App\Http\Controllers\HomeBackendController::class, 'index'])->name('home');
Route::get('backend/index', 'HomeBackendController@index')->name('backend.index');
Route::get('backend/artistes/create', 'ArtistaController@create')->name('backend.artistes.create');

Auth::routes();
