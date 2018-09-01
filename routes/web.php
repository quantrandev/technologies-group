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
        //delete
        Route::post('/product-category/delete/{id}', 'ProductCategoryController@delete')->name('product-category.delete');
        //create
        Route::post('/product-category/insert', 'ProductCategoryController@insert')->name('product-category.insert');
        Route::get('/product-category/create', 'ProductCategoryController@create')->name('product-category.create');
        //update
        Route::post('/product-category/update', 'ProductCategoryController@update')->name('product-category.update');
        Route::get('/product-category/edit/{id}', 'ProductCategoryController@edit')->name('product-category.edit');
        //list
        Route::get('/product-category', 'ProductCategoryController@index')->name('product-category.index');

            //product
        //delete
        Route::post('/product/delete/{id}', 'ProductController@delete')->name('product.delete');
        //create
        Route::post('/product/insert', 'ProductController@insert')->name('product.insert');
        Route::get('/product/create', 'ProductController@create')->name('product.create');
        //update
        Route::post('/product/update', 'ProductController@update')->name('product.update');
        Route::get('/product/edit/{id}', 'ProductController@edit')->name('product.edit');
        //list
        Route::get('/product', 'ProductController@index')->name('product.index');

          //customer
        //delete
        Route::post('/customer/delete/{id}', 'CustomerController@delete')->name('customer.delete');
        //create
        Route::post('/customer/insert', 'CustomerController@insert')->name('customer.insert');
        Route::get('/customer/create', 'CustomerController@create')->name('customer.create');
        //update
        Route::post('/customer/update', 'CustomerController@update')->name('customer.update');
        Route::get('/customer/edit/{id}', 'CustomerController@edit')->name('customer.edit');
        //list
        Route::get('/customer', 'CustomerController@index')->name('customer.index');
    });
// });

Auth::routes();
