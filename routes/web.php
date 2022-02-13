<?php

use Illuminate\Support\Facades\Artisan;
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

// Route::get('/', 'HomeBackendController@index')->name('backend.index');

Auth::routes();

// Remove route cache
Route::get('/clear-route-cache', function() {
    $exitCode = Artisan::call('route:cache');
    return 'All routes cache has just been removed';
});
//Remove config cache
Route::get('/clear-config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return 'Config cache has just been removed';
}); 
// Remove application cache
Route::get('/clear-app-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return 'Application cache has just been removed';
});
// Remove view cache
Route::get('/clear-view-cache', function() {
    $exitCode = Artisan::call('view:clear');
    return 'View cache has jut been removed';
});
// New key
Route::get('/new-key', function() {
    $exitCode = Artisan::call('key:generate');
    return 'Keys';
});

Route::get('/generate', function () {
    $exitCode = Artisan::call('storage:link');
    return 'Storage Link created!!! :)';
});

Route::get('/link', function () {        
    $target = '/domains/satelitek.com/public_html/storage/app/public';
    $shortcut = '/domains/satelitek.com/public_html/public/storage';
    symlink($target, $shortcut);
});

// Route::get('/home', [App\Http\Controllers\HomeBackendController::class, 'index'])->name('home');
Route::get('backend/inici', 'HomeBackendController@index')->name('backend.inici.index');
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
/* Llibres */
Route::get('backend/llibres', 'LlibreController@index')->name('backend.llibres.index');
Route::get('backend/llibres/create', 'LlibreController@create')->name('backend.llibres.create');
Route::post('backend/llibres', 'LlibreController@store')->name('backend.llibres.store');
Route::get('backend/llibres/{llibre}/edit', 'LlibreController@edit')->name('backend.llibres.edit');
Route::put('backend/llibres/{llibre}', 'LlibreController@update')->name('backend.llibres.update');
Route::delete('backend/llibres/{llibre}', 'LlibreController@destroy')->name('backend.llibres.destroy');
/* Discs */
Route::get('backend/discs', 'DiscController@index')->name('backend.discs.index');
Route::get('backend/discs/create', 'DiscController@create')->name('backend.discs.create');
Route::post('backend/discs', 'DiscController@store')->name('backend.discs.store');
Route::get('backend/discs/{disc}/edit', 'DiscController@edit')->name('backend.discs.edit');
Route::put('backend/discs/{disc}', 'DiscController@update')->name('backend.discs.update');
Route::delete('backend/discs/{disc}', 'DiscController@destroy')->name('backend.discs.destroy');


