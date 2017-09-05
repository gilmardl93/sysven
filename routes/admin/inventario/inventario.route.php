<?php

    Route::group(['namespace' => 'Admin', 'middleware' => 'auth'], function() 
    {
        Route::group(['namespace' => 'Inventarios', 'middleware' => 'auth'], function() 
        {
            Route::get('inventario-general','InventarioController@general');
        });        
    });