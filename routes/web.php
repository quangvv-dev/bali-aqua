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

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/', 'HomeController@index');
Route::get('danh-muc/san-pham', 'HomeController@products');
Route::get('danh-muc/san-pham/{slug}', 'HomeController@products');
Route::get('san-pham/{slug}', 'HomeController@product');
Route::get('/tin-tuc', 'HomeController@articles');
Route::get('/tin-tuc/{slug}', 'HomeController@article');
Route::get('/{slug}', 'HomeController@page');


Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/dashboard', function () { return view('layouts.admin'); });
    Route::resource('category', 'CategoryController');

    Route::get('pages/all', 'PageController@all');
    Route::get('articles/all', 'ArticleController@all');
    Route::get('products/all', 'ProductController@all');
    Route::get('categories/all', 'CategoryController@all');

    Route::resource('pages', 'PageController');
    Route::resource('articles', 'ArticleController');
    Route::resource('products', 'ProductController');
    Route::resource('menus', 'MenuController');

    Route::resource('settings', 'SettingController');
    Route::get('slides/{id}/ajax-update','SlideController@ajaxUpdate');
    Route::resource('slides', 'SlideController');
    Route::get('galleries/{id}/ajax-update','GalleryController@ajaxUpdate');
    Route::resource('galleries', 'GalleryController');
});
