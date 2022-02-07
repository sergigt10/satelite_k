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
/* Artistes */
Route::get('backend/artistes', 'ArtistaController@index')->name('backend.artistes.index');
Route::get('backend/artistes/create', 'ArtistaController@create')->name('backend.artistes.create');
Route::post('backend/artistes', 'ArtistaController@store')->name('backend.artistes.store');
Route::get('backend/artistes/{artista}/edit', 'ArtistaController@edit')->name('backend.artistes.edit');
Route::put('backend/artistes/{artista}', 'ArtistaController@update')->name('backend.artistes.update');
Route::delete('backend/artistes/{artista}', 'ArtistaController@destroy')->name('backend.artistes.destroy');
/* Gèneres */
Route::get('backend/generes', 'GenereController@index')->name('backend.generes.index');
Route::get('backend/generes/create', 'GenereController@create')->name('backend.generes.create');
Route::post('backend/generes', 'GenereController@store')->name('backend.generes.store');
Route::get('backend/generes/{genere}/edit', 'GenereController@edit')->name('backend.generes.edit');
Route::put('backend/generes/{genere}', 'GenereController@update')->name('backend.generes.update');
Route::delete('backend/generes/{genere}', 'GenereController@destroy')->name('backend.generes.destroy');
/* Blog */
Route::get('backend/noticies', 'NoticiaController@index')->name('backend.noticies.index');
Route::get('backend/noticies/create', 'NoticiaController@create')->name('backend.noticies.create');
Route::post('backend/noticies', 'NoticiaController@store')->name('backend.noticies.store');
Route::get('backend/noticies/{noticia}/edit', 'NoticiaController@edit')->name('backend.noticies.edit');
Route::put('backend/noticies/{noticia}', 'NoticiaController@update')->name('backend.noticies.update');
Route::delete('backend/noticies/{noticia}', 'NoticiaController@destroy')->name('backend.noticies.destroy');


