<?php

    Route::group(['namespace' => 'Admin', 'middleware' => 'auth'], function() 
    {
        Route::group(['namespace' => 'Empresas', 'middleware' => 'auth'], function() 
        {
            Route::get('empresa','EmpresasController@index');
            Route::get('listado-empresas','EmpresasController@listado');
            Route::get('listado-empresas-json','EmpresasController@listadoJson');
            Route::get('nuevo-empresa','EmpresasController@nuevo');
            Route::post('registrar-empresa','EmpresasController@registrar')->name('empresa.registrar');
            Route::get('eliminar-empresa/{id}','EmpresasController@eliminar');
            Route::get('editar-empresa/{id}','EmpresasController@editar');
            Route::post('actualizar-empresa','EmpresasController@actualizar')->name('empresa.actualizar');
        });        
    });