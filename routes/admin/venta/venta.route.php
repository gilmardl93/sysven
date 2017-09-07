<?php

    Route::group(['namespace' => 'Admin', 'middleware' => 'auth'], function() 
    {
        Route::group(['namespace' => 'Ventas', 'middleware' => 'auth'], function() 
        {
            Route::get('venta','VentasController@index');
            Route::get('listado-ventas','VentasController@listado');
            Route::get('anular','VentasController@anular');

            Route::get('boleta','VentasController@boleta');
            Route::post('registrar-producto-venta-boleta','VentasController@registrarProductoBoleta');
            Route::get('eliminar-producto-agregado-boleta/{id}','VentasController@eliminarProductoBoleta');
            Route::post('registrar-boleta','VentasController@registrarBoleta');
            Route::get('anular-boleta','VentasController@anularBoleta');
            Route::post('boleta-anulada','VentasController@BoletaAnulada');

            Route::get('factura','VentasController@factura');
            Route::post('registrar-producto-venta-factura','VentasController@registrarProductoFactura');
            Route::get('eliminar-producto-agregado-boleta/{id}','VentasController@eliminarProductoFactura');
            Route::post('registrar-factura','VentasController@registrarFactura');
            Route::get('anular-factura','VentasController@anularFactura');
            Route::post('boleta-factura','VentasController@FacturaAnulada');
            
            Route::get('ticket','VentasController@ticket');
            Route::post('registrar-producto-venta-ticket','VentasController@registrarProductoTicket');
            Route::get('eliminar-producto-agregado-ticket/{id}','VentasController@eliminarProductoTicket');
            Route::post('registrar-ticket','VentasController@registrarTicket');
            Route::get('anular-ticket','VentasController@anularTicket');
            Route::post('boleta-ticket','VentasController@TicketAnulada');
        });        
    });