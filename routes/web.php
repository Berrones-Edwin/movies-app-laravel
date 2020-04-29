<?php

use Illuminate\Support\Facades\Route;




Route::get('/','MoviesController@index')->name('movies.index');
Route::get('/movie/{movie}','MoviesController@show')->name('movies.show');

Route::get('/actors','ActorsController@index')->name('actors.index');
Route::get('/actors/page/{page?}','ActorsController@index');

Route::get('/actor/{actors}','ActorsController@show')->name('actors.show');


Route::get('/tv', 'TvController@index')->name('tv.index');
Route::get('/tv/{id}', 'TvController@show')->name('tv.show');