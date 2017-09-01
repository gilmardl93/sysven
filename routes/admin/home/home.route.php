<?php
    Route::group(['middleware' => 'auth'], function(){

        Route::get('/','HomeController@dashboard');

    });

    Route::get('login','HomeController@index')->name('login');