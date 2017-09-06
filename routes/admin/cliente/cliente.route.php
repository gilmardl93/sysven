<?php

    Route::group(['namespace' => 'Admin', 'middleware' => 'auth'], function() 
    {
        Route::group(['namespace' => 'Clientes', 'middleware' => 'auth'], function() 
        {
            Route::get('cliente','ClientesController@index');
            Route::get('listado-clientes','ClientesController@listado');
            Route::get('listado-clientes-json','ClientesController@listadoJson');
            Route::post('registrar-cliente','ClientesController@registrar')->name('cliente.registrar');
            Route::get('eliminar-cliente/{id}','ClientesController@eliminar');
            Route::get('editar-cliente/{id}','ClientesController@editar');
            Route::post('actualizar-cliente','ClientesController@actualizar')->name('cliente.actualizar');
        });        
    });