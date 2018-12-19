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

Route::get('/', 'MainController@index')->name('index');

Route::get('/rest', 'MainController@indexRest')->name('index_index');

Auth::routes();

Route::namespace('Auth')->group(function () {
    Route::get('logout', 'LoginController@logout');
});

Route::namespace('Api')->prefix('api')->group(function () {
    Route::resource('/movies', 'MoviesController');
});

Route::namespace('Admin')->prefix('admin')->group(function () {
    Route::get('/', 'AdminController@index')->name('admin_home');

    Route::middleware(['auth'])->group(function () {
        Route::get('/movies', 'MoviesController@index')->name('admin_movies');
        Route::get('/movies/create', 'MoviesController@create')->name('admin_movies_create');
        Route::get('/movies/edit/{movies}', 'MoviesController@edit')->name('admin_movies_edit');
        Route::post('/movies/update/{movies}', 'MoviesController@update')->name('admin_movies_update');
        Route::post('/movies/save', 'MoviesController@store')->name('admin_movies_save');
        Route::get('/movies/delete/{movies}', 'MoviesController@destroy')->name('admin_movies_delete');
    });
});


