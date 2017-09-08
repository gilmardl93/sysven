<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compra;
use App\Models\Venta;
use App\Models\Producto;
use App\Models\Cliente;
use App\Models\Caja;
use App\Models\Inventario;
use Auth;
use DB;	

class HomeController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function dashboard()
    {
        $resultado = Inventario::BuscarTienda(Auth::user()->idtienda)
                                ->select('p.nombre as producto','p.codigo','pre.nombre as presentacion','c.nombre as categoria','m.nombre as marca','p.precio_venta', DB::raw('count(*) as total'))
                                ->join('producto as p','p.id','=','inventario.idproducto')
                                ->join('categoria as c','c.id','=','p.idcategoria')
                                ->join('marca as m','m.id','=','p.idmarca')
                                ->join('presentacion as pre','pre.id','=','p.idpresentacion')
                                ->groupBy('producto','p.codigo','presentacion','categoria','marca','p.precio_venta')
                                ->get();

        $compras = Compra::count();
        $ventas = Venta::count();
        $productos = Producto::count();
        $clientes = Cliente::count();
        $caja = Caja::AperturaAbierta()->count();
        return view('admin.home.index', compact(['compras', 'ventas', 'productos', 'clientes', 'caja','resultado']));
    }
}
