<?php

namespace App\Http\Controllers\Admin\Inventarios;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Inventario\InventarioRequest;
use App\Models\Producto;
use App\Models\Tienda;
use App\Models\Inventario;
use Alert;
use DB;

class InventarioController extends Controller
{
    public function general()
    {
        $productos = Producto::with(['categoria','marca','presentacion'])->get();
        return view('admin.inventario.index', compact('productos'));
    }

    public function tienda()
    {
        $tienda = Tienda::pluck('nombre','id');
        return view('admin.inventario.tienda', compact(['tienda']));
    }

    public function buscarInventario(Request $request)
    {
        $resultado = Inventario::BuscarTienda($request->tienda)
                                ->select('p.nombre as producto','p.codigo','pre.nombre as presentacion','c.nombre as categoria','m.nombre as marca','p.precio_venta', DB::raw('count(*) as total'))
                                ->join('producto as p','p.id','=','inventario.idproducto')
                                ->join('categoria as c','c.id','=','p.idcategoria')
                                ->join('marca as m','m.id','=','p.idmarca')
                                ->join('presentacion as pre','pre.id','=','p.idpresentacion')
                                ->groupBy('producto','p.codigo','presentacion','categoria','marca','p.precio_venta')
                                ->get();
                                
        $movimiento = Inventario::BuscarTienda($request->tienda)
                                ->select('inventario.fecha_hora','p.nombre as producto','p.codigo','p.precio_compra','p.precio_venta','pre.nombre as presentacion','c.nombre as categoria','m.nombre as marca','inventario.stock as stock')
                                ->join('producto as p','p.id','=','inventario.idproducto')
                                ->join('categoria as c','c.id','=','p.idcategoria')
                                ->join('marca as m','m.id','=','p.idmarca')
                                ->join('presentacion as pre','pre.id','=','p.idpresentacion')
                                ->get();
        return view('admin.inventario.resultado', compact(['movimiento', 'resultado']));
    }

    public function agregarInventario(InventarioRequest $request)
    {
        $data = new Inventario();
        $data->idtienda     = $request->tienda;
        $data->idproducto   = $request->producto;
        $data->stock        = $request->stock;
        $data->fecha_hora   = date("Y-m-d H:i:s");
        $data->save();

        Producto::where('id',$request->producto)->decrement('stock', $request->stock);
        return redirect('inventario-tiendas')->with('message','Se agrego producto a la tienda');
    }
}

