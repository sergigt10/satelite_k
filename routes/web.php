<?php

use Illuminate\Support\Facades\Route;

// FrontEnd

/* Inici */

Route::get('/', 'HomeFrontendController@index')->name('frontend.inici.index');

/* Artistes */

Route::get('/artistes', 'ArtistesFrontendController@index')->name('frontend.artistes.index');
Route::get('/artistes/{artista}', 'ArtistesFrontendController@show')->name('frontend.artistes.show');

/* Discs */

Route::get('/discs', 'DiscsFrontendController@index')->name('frontend.discs.index');
Route::get('/discs/{disc}', 'DiscsFrontendController@show')->name('frontend.discs.show');

/* Llibres */

Route::get('/llibres', 'LlibresFrontendController@index')->name('frontend.llibres.index');
Route::get('/llibres/{llibre}', 'LlibresFrontendController@show')->name('frontend.llibres.show');

// BackEnd

Auth::routes();

Route::group(['middleware' => ['auth']], function() {
    /* Inici */
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
    /* Sliders */
    Route::get('backend/sliders', 'SliderController@index')->name('backend.sliders.index');
    Route::get('backend/sliders/create', 'SliderController@create')->name('backend.sliders.create');
    Route::post('backend/sliders', 'SliderController@store')->name('backend.sliders.store');
    Route::get('backend/sliders/{slider}/edit', 'SliderController@edit')->name('backend.sliders.edit');
    Route::put('backend/sliders/{slider}', 'SliderController@update')->name('backend.sliders.update');
    Route::delete('backend/sliders/{slider}', 'SliderController@destroy')->name('backend.sliders.destroy');
});