<?php

    Route::group(['namespace' => 'Admin', 'middleware' => 'auth'], function() 
    {
        Route::group(['namespace' => 'Cajas', 'middleware' => 'auth'], function() 
        {
            Route::get('aperturar-caja','CajasController@index');
            Route::post('apertura-caja','CajasController@aperturar');
            Route::post('cerrar-caja','CajasController@cerrar');
        });        
    });