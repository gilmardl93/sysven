<?php

    Route::group(['namespace' => 'Admin', 'middleware' => 'auth'], function() 
    {
        Route::group(['namespace' => 'Compras', 'middleware' => 'auth'], function() 
        {
            Route::get('compra','ComprasController@index');
            Route::get('listado-compras','ComprasController@listado');
            Route::get('nueva-compra','ComprasController@nuevo');
            Route::post('registrar-compra','ComprasController@registrar')->name('compra.registrar');
            Route::get('eliminar-compra/{id}','ComprasController@eliminar');
            Route::get('editar-compra/{id}','ComprasController@editar');
            Route::post('actualizar-compra','ComprasController@actualizar')->name('compra.actualizar');
            Route::post('agregar-producto-compra','ComprasController@agregarproducto')->name('compra.agregar.producto'); 
            Route::get('eliminar-producto-agregado/{id}','ComprasController@eliminarproducto');
        });        
    });