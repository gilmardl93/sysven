<?php

    Route::group(['namespace' => 'Admin', 'middleware' => 'auth'], function() 
    {
        Route::group(['namespace' => 'Ventas', 'middleware' => 'auth'], function() 
        {
            Route::get('venta','VentasController@index');
            Route::get('listado-ventas','VentasController@listado');
            Route::get('nueva-venta','VentasController@nuevo');
            Route::post('registrar-venta','VentasController@registrar')->name('venta.registrar');
            Route::get('eliminar-venta/{id}','VentasController@eliminar');
            Route::get('editar-venta/{id}','VentasController@editar');
            Route::post('actualizar-venta','VentasController@actualizar')->name('venta.actualizar');
            Route::post('agregar-producto','VentasController@agregarproducto')->name('venta.agregar.producto'); 
            Route::get('eliminar-producto-agregado/{id}','VentasController@eliminarproducto');
        });        
    });