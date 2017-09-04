<?php

    Route::group(['namespace' => 'Admin', 'middleware' => 'auth'], function() 
    {
        Route::group(['namespace' => 'Provedores', 'middleware' => 'auth'], function() 
        {
            Route::get('provedor','ProvedoresController@index');
            Route::get('listado-provedores','ProvedoresController@listado');
            Route::get('listado-provedores-json','ProvedoresController@listadoJson');
            Route::get('nuevo-provedor','ProvedoresController@nuevo');
            Route::post('registrar-provedor','ProvedoresController@registrar')->name('provedor.registrar');
            Route::get('eliminar-provedor/{id}','ProvedoresController@eliminar');
            Route::get('editar-provedor/{id}','ProvedoresController@editar');
            Route::post('actualizar-provedor','ProvedoresController@actualizar')->name('provedor.actualizar');
        });        
    });