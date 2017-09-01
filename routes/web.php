<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

require __DIR__.'/admin/home/home.route.php';
require __DIR__.'/admin/categoria/categoria.route.php';
require __DIR__.'/admin/marca/marca.route.php';
require __DIR__.'/admin/presentacion/presentacion.route.php';
require __DIR__.'/admin/tipo/tipo.route.php';
require __DIR__.'/auth/auth.route.php';

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');