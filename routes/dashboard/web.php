<?php

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ],
    function()
    {
        Route::prefix('dashboard')->name('dashboard.')->middleware(['auth'])->group(function(){

            Route::get('/index','DashboardController@index')->name('index');

            //unit routes
            Route::resource('unit','unitController');

            //category routes
            Route::resource('category/type','categoryController');
//
//            //products routes
            Route::resource('products','productController');
//
             //item title
            Route::resource('itemtitle','itemtitleController');
        });
    });

