<?php

    Route::group(['namespace' => 'Admin', 'middleware' => 'auth'], function() 
    {
        Route::group(['namespace' => 'Usuarios', 'middleware' => 'auth'], function() 
        {
            Route::get('usuario','UsuariosController@index');
            Route::get('listado-usuarios','UsuariosController@listado');
            Route::get('listado-usuarios-json','UsuariosController@listadoJson');
            Route::post('registrar-usuario','UsuariosController@registrar')->name('usuario.registrar');
            Route::get('eliminar-usuario/{id}','UsuariosController@eliminar');
            Route::get('editar-usuario/{id}','UsuariosController@editar');
            Route::post('actualizar-usuario','UsuariosController@actualizar')->name('usuario.actualizar');
        });        
    });