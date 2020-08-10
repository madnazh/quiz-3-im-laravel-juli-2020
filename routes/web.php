<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/', 'ItemController@proyek');
Route::get('/proyek', 'ItemController@index');

Route::get('/items/create', 'ItemController@create'); // menampilkan halaman form
Route::post('/items', 'ItemController@store'); // menyimpan data
Route::get('/items', 'ItemController@index'); // menampilkan semua
Route::get('/items/{id}', 'ItemController@show'); // menampilkan detail item dengan id 
Route::get('/items/{id}/edit', 'ItemController@edit'); // menampilkan form untuk edit item
Route::put('/items/{id}', 'ItemController@update'); // menyimpan perubahan dari form edit
Route::delete('/items/{id}', 'ItemController@destroy'); // menghapus data dengan id 


Route::get('/proyek/create', 'ItemController@create');

Route::post('/proyek', 'ItemController@store');

Route::get('/proyek', 'ItemController@index'); 

Route::get('/proyek/{id}', 'ItemController@show');

Route::get('/proyek/{id}/edit', 'ItemController@edit'); 

Route::put('/proyek/{id}', 'ItemController@update');

Route::delete('/proyek/{id}', 'ItemController@destroy');