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

// Route::group(['middleware'=>'auth'], function () {
    Route::namespace('Admin')->prefix('admin/')->group(function () {
        Route::get('/', 'DashboardController@index')->name('admin.dashboard');

        //product category
        Route::post('/product-category/delete/{id}', 'ProductCategoryController@delete')->name('product-category.delete');
        Route::post('/product-category/insert', 'ProductCategoryController@insert')->name('product-category.insert');
        Route::get('/product-category/create', 'ProductCategoryController@create')->name('product-category.create');
        Route::post('/product-category/update', 'ProductCategoryController@update')->name('product-category.update');
        Route::get('/product-category/edit/{id}', 'ProductCategoryController@edit')->name('product-category.edit');
        Route::get('/product-category', 'ProductCategoryController@index')->name('product-category.index');
    });
// });

Auth::routes();
