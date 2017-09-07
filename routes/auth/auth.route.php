<?php

    Route::group(['namespace' => 'Sesion'], function(){
        
        Route::post('iniciar-sesion','SesionController@login')->name('sesion');
        Route::get('logout','SesionController@logout')->name('logout');

    });