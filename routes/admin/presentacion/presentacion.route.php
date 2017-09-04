<?php

    Route::group(['namespace' => 'Admin', 'middleware' => 'auth'], function() 
    {
        Route::group(['namespace' => 'Presentaciones', 'middleware' => 'auth'], function() 
        {
            Route::get('presentacion','PresentacionesController@index');
            Route::get('listado-presentaciones','PresentacionesController@listado');
            Route::get('listado-presentaciones-json','PresentacionesController@listadoJson');
            Route::post('registrar-presentacion','PresentacionesController@registrar')->name('presentacion.registrar');
            Route::get('eliminar-presentacion/{id}','PresentacionesController@eliminar');
            Route::get('editar-presentacion/{id}','PresentacionesController@editar');
            Route::post('actualizar-presentacion','PresentacionesController@actualizar')->name('presentacion.actualizar');
        });        
    });