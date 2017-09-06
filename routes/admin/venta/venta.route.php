<?php

    Route::group(['namespace' => 'Admin', 'middleware' => 'auth'], function() 
    {
        Route::group(['namespace' => 'Ventas', 'middleware' => 'auth'], function() 
        {
            Route::get('venta','VentasController@index');
            Route::get('listado-ventas','VentasController@listado');

            Route::get('boleta','VentasController@boleta');
            Route::post('registrar-producto-venta-boleta','VentasController@registrarProductoBoleta');
            Route::get('eliminar-producto-agregado-boleta/{id}','VentasController@eliminarProductoBoleta');
            Route::post('registrar-boleta','VentasController@registrarBoleta');

            Route::get('factura','VentasController@factura');
            Route::post('registrar-producto-venta-factura','VentasController@registrarProductoFactura');
            Route::get('eliminar-producto-agregado-boleta/{id}','VentasController@eliminarProductoFactura');
            Route::post('registrar-factura','VentasController@registrarFactura');
            
            Route::get('ticket','VentasController@ticket');
            Route::post('registrar-producto-venta-ticket','VentasController@registrarProductoTicket');
            Route::get('eliminar-producto-agregado-ticket/{id}','VentasController@eliminarProductoTicket');
            Route::post('registrar-ticket','VentasController@registrarTicket');
        });        
    });