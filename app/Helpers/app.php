<?php

use App\Models\Categoria;
use App\Models\Marca;
use App\Models\Presentacion;

/**
 * devuelve el id estado de catalogo
 */
if (! function_exists('categoria')) {
    /**
     * funcion que retorna el prefijo para nombres de archivos
     * @return [type] [description]
     */
    function categoria($id)
    {
        if (isset($id)) {
            $categoria = Categoria::where('id',$id)->pluck('nombre','id')->toarray();
        } else {
            $categoria=[];
        }
        return $categoria;
    }
}

/**
 * devuelve el id estado de catalogo
 */
if (! function_exists('presentacion')) {
    /**
     * funcion que retorna el prefijo para nombres de archivos
     * @return [type] [description]
     */
    function presentacion($id)
    {
        if (isset($id)) {
            $presentacion = Presentacion::where('id',$id)->pluck('nombre','id')->toarray();
        } else {
            $presentacion=[];
        }
        return $presentacion;
    }
}

/**
 * devuelve el id estado de catalogo
 */
if (! function_exists('marca')) {
    /**
     * funcion que retorna el prefijo para nombres de archivos
     * @return [type] [description]
     */
    function marca($id)
    {
        if (isset($id)) {
            $marca = Marca::where('id',$id)->pluck('nombre','id')->toarray();
        } else {
            $marca=[];
        }
        return $marca;
    }
}