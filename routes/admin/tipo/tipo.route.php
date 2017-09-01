<?php

    Route::group(['namespace' => 'Admin', 'middleware' => 'auth'], function() 
    {
        Route::group(['namespace' => 'Tipos', 'middleware' => 'auth'], function() 
        {
            Route::get('tipo','TiposController@index');
            Route::get('listado-tipos','TiposController@listado');
            Route::post('registrar-tipo','TiposController@registrar')->name('tipo.registrar');
            Route::get('eliminar-tipo/{id}','TiposController@eliminar');
            Route::get('editar-tipo/{id}','TiposController@editar');
            Route::post('actualizar-tipo','TiposController@actualizar')->name('tipo.actualizar');
        });        
    });