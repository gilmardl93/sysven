<?php

    Route::group(['namespace' => 'Admin', 'middleware' => 'auth'], function() 
    {
        Route::group(['namespace' => 'Ventas', 'middleware' => 'auth'], function() 
        {
            Route::get('venta','VentasController@index');
            Route::get('listado-ventas','VentasController@listado');
            Route::get('nueva-venta','VentasController@nuevo');
            Route::post('agregar-producto-venta','VentasController@agregarproducto')->name('venta.agregar.producto'); 
        });        
    });