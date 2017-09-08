<?php

    Route::group(['namespace' => 'Admin', 'middleware' => 'auth'], function() 
    {
        Route::group(['namespace' => 'Ventas', 'middleware' => 'auth'], function() 
        {
            Route::get('reporte-boleta','ReportesController@boleta');
            Route::get('reporte-factura','ReportesController@factura');
            Route::get('reporte-ticket','ReportesController@ticket');
        });        
    });