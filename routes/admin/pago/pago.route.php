<?php

    Route::group(['namespace' => 'Admin', 'middleware' => 'auth'], function() 
    {
        Route::group(['namespace' => 'Pagos', 'middleware' => 'auth'], function() 
        {
            Route::get('pago','PagosController@index');
            Route::get('listado-pagos','PagosController@listado');
            Route::post('registrar-pago','PagosController@registrar')->name('pago.registrar');
            Route::get('eliminar-pago/{id}','PagosController@eliminar');
            Route::get('editar-pago/{id}','PagosController@editar');
            Route::post('actualizar-pago','PagosController@actualizar')->name('pago.actualizar');
        });        
    });