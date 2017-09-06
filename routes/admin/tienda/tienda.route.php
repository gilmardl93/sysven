<?php

    Route::group(['namespace' => 'Admin', 'middleware' => 'auth'], function() 
    {
        Route::group(['namespace' => 'Tiendas', 'middleware' => 'auth'], function() 
        {
            Route::get('tiendas','TiendasController@index');
            Route::get('listado-tiendas','TiendasController@listado');
            Route::get('nuevo-tienda','TiendasController@nuevo');
            Route::post('registrar-tienda','TiendasController@registrar')->name('tienda.registrar');
            Route::get('eliminar-tienda/{id}','TiendasController@eliminar');
            Route::get('editar-tienda/{id}','TiendasController@editar');
            Route::post('actualizar-tienda','TiendasController@actualizar')->name('tienda.actualizar');
        });        
    });