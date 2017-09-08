<?php

    Route::group(['namespace' => 'Admin', 'middleware' => 'auth'], function() 
    {
        Route::group(['namespace' => 'Inventarios', 'middleware' => 'auth'], function() 
        {
            Route::get('inventario-general','InventarioController@general');
            Route::get('inventario-tiendas','InventarioController@tienda');
            Route::post('buscar-inventario','InventarioController@buscarInventario')->name('buscar.inventario');
            Route::post('agregar-inventario','InventarioController@agregarInventario')->name('agregar.inventario');
        });        
    });