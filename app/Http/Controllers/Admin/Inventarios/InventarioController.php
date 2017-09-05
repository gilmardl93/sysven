<?php

namespace App\Http\Controllers\Admin\Inventarios;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Producto;

class InventarioController extends Controller
{
    public function general()
    {
        $productos = Producto::with(['categoria','marca','presentacion'])->get();
        return view('admin.inventario.index', compact('productos'));
    }
}
