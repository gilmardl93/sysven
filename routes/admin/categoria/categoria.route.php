<?php

    Route::group(['namespace' => 'Admin', 'middleware' => 'auth'], function() 
    {
        Route::group(['namespace' => 'Categorias', 'middleware' => 'auth'], function() 
        {
            Route::get('categoria','CategoriasController@index');
            Route::get('listado-categorias','CategoriasController@listado');
            Route::get('listado-categorias-json','CategoriasController@listadoJson');
            Route::post('registrar-categoria','CategoriasController@registrar')->name('categoria.registrar');
            Route::get('eliminar-categoria/{id}','CategoriasController@eliminar');
            Route::get('editar-categoria/{id}','CategoriasController@editar');
            Route::post('actualizar-categoria','CategoriasController@actualizar')->name('categoria.actualizar');
        });        
    });