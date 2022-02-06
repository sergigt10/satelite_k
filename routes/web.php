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

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeBackendController::class, 'index'])->name('home');
Route::get('backend/index', 'HomeBackendController@index')->name('backend.index');
Route::get('backend/artistes', 'ArtistaController@index')->name('backend.artistes.index');
Route::get('backend/artistes/create', 'ArtistaController@create')->name('backend.artistes.create');
Route::post('backend/artistes', 'ArtistaController@store')->name('backend.artistes.store');
Route::get('backend/artistes/{artista}/edit', 'ArtistaController@edit')->name('backend.artistes.edit');
Route::put('backend/artistes/{artista}', 'ArtistaController@update')->name('backend.artistes.update');
Route::delete('backend/artistes/{artista}', 'ArtistaController@destroy')->name('backend.artistes.destroy');



