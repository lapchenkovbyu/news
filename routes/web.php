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

Route::get('/','HomeController@index' );


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/news', 'PageController@allNews')->name('allNews');
//Route::get('/news/{article}', 'PageController@singleArticle')->name('article');
Route::get('/news/create', 'PageController@createArticle')->name('create');
Route::post('/news/create-article', 'ArticleController@createArticle')->name('createArticle');
Route::get('/news/get-articles', 'ArticleController@getArticles')->name('getArticles');
