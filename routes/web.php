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

Route::get('/', "ArticleController@index")->name('home');

Route::get('/article/create', 'ArticleController@create')->name('article.create'); // menampilkan halaman form
Route::post('/article', 'ArticleController@store')->name('article.store'); // menyimpan data
Route::get('/article', 'ArticleController@index')->name('article.index'); // menampilkan semua
Route::get('/article/{id}', 'ArticleController@show')->name('article.show'); // menampilkan detail Article dengan id 
Route::get('/article/{id}/edit', 'ArticleController@edit')->name('article.edit'); // menmenampilkan form untuk edit Article
Route::put('/article/{id}', 'ArticleController@update')->name('article.update'); // menmenyimpan perubahan dari form edit
Route::delete('/article/{id}', 'ArticleController@destroy')->name('article.destroy'); // menghapus data dengan id