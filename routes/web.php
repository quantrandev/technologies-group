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

         //news
        //delete
        Route::post('/news/delete/{id}', 'NewsController@delete')->name('news.delete');
        //create
        Route::post('/news/insert', 'NewsController@insert')->name('news.insert');
        Route::get('/news/create', 'NewsController@create')->name('news.create');
        //update
        Route::post('/news/update', 'NewsController@update')->name('news.update');
        Route::get('/news/edit/{id}', 'NewsController@edit')->name('news.edit');
        //list
        Route::get('/news', 'NewsController@index')->name('news.index');
        //content
        Route::get('/news/content/{id}', 'NewsController@content')->name('news.content');

         //recruitment
        //delete
        Route::post('/recruitment/delete/{id}', 'RecruitmentController@delete')->name('recruitment.delete');
        //create
        Route::post('/recruitment/insert', 'RecruitmentController@insert')->name('recruitment.insert');
        Route::get('/recruitment/create', 'RecruitmentController@create')->name('recruitment.create');
        //update
        Route::post('/recruitment/update', 'RecruitmentController@update')->name('recruitment.update');
        Route::get('/recruitment/edit/{id}', 'RecruitmentController@edit')->name('recruitment.edit');
        //list
        Route::get('/recruitment', 'RecruitmentController@index')->name('recruitment.index');
        //detail
        Route::get('/recruitment/detail/{id}', 'RecruitmentController@detail')->name('recruitment.detail');

        //subsidiary
        //delete
        Route::post('/subsidiary/delete/{id}', 'SubsidiaryController@delete')->name('subsidiary.delete');
        //create
        Route::post('/subsidiary/insert', 'SubsidiaryController@insert')->name('subsidiary.insert');
        Route::get('/subsidiary/create', 'SubsidiaryController@create')->name('subsidiary.create');
        //update
        Route::post('/subsidiary/update', 'SubsidiaryController@update')->name('subsidiary.update');
        Route::get('/subsidiary/edit/{id}', 'SubsidiaryController@edit')->name('subsidiary.edit');
        //list
        Route::get('/subsidiary', 'SubsidiaryController@index')->name('subsidiary.index');
        //description
        Route::get('/subsidiary/description/{id}', 'SubsidiaryController@description')->name('subsidiary.detail');
    });
// });

Auth::routes();
