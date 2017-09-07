<?php

    Route::group(['namespace' => 'Admin', 'middleware' => 'auth'], function() 
    {
        Route::group(['namespace' => 'Productos', 'middleware' => 'auth'], function() 
        {
            Route::get('producto','ProductosController@index');
            Route::get('listado-productos','ProductosController@listado');
            Route::get('nuevo-producto','ProductosController@nuevo');
            Route::post('registrar-producto','ProductosController@registrar')->name('producto.registrar');
            Route::get('eliminar-producto/{id}','ProductosController@eliminar');
            Route::get('editar-producto/{id}','ProductosController@editar');
            Route::post('actualizar-producto','ProductosController@actualizar')->name('producto.actualizar');

            Route::post('buscar-producto','ProductosController@buscar');

            Route::get('listado-productos-json','ProductosController@listadoJson')->name('producto.agregar');
            Route::get('listado-productos-disponibles-json','ProductosController@listadoDisponibleJson')->name('producto.agregar');
        });        
    });