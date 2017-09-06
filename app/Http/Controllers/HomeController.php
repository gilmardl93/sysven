<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compra;
use App\Models\Venta;
use App\Models\Producto;
use App\Models\Cliente;

class HomeController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function dashboard()
    {
        $compras = Compra::count();
        $ventas = Venta::count();
        $productos = Producto::count();
        $clientes = Cliente::count();
        return view('admin.home.index', compact(['compras', 'ventas', 'productos', 'clientes']));
    }
}
