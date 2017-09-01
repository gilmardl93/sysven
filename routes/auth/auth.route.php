<?php

    Route::group(['namespace' => 'Auth'], function(){
        
        Route::post('iniciar-sesion','LoginController@login')->name('auth.login');

    });