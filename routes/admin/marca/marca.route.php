<?php

    Route::group(['namespace' => 'Admin', 'middleware' => 'auth'], function() 
    {
        Route::group(['namespace' => 'Marcas', 'middleware' => 'auth'], function() 
        {
            Route::get('marca','MarcasController@index');
            Route::get('listado-marcas','MarcasController@listado');
            Route::get('listado-marcas-json','MarcasController@listadoJson');
            Route::post('registrar-marca','MarcasController@registrar')->name('marca.registrar');
            Route::get('eliminar-marca/{id}','MarcasController@eliminar');
            Route::get('editar-marca/{id}','MarcasController@editar');
            Route::post('actualizar-marca','MarcasController@actualizar')->name('marca.actualizar');
        });        
    });