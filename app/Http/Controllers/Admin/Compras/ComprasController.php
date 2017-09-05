<?php

namespace App\Http\Controllers\Admin\Compras;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\Compra\RegistrarRequest;
use App\Http\Requests\Admin\Compra\AgregarProductoRequest;
use App\Models\Compra;
use App\Models\Tipo;
use App\Models\Pago;
use App\Models\Producto;
use DB;

class ComprasController extends Controller
{
    public function index()
    {
        return view('admin.compra.index');
    }

    public function listado()
    {
        $compra = Compra::where('idtipo','<>','')->with(['pago','tipo','producto'])->get();
        $lista['data'] = $compra;
        return $lista;
    }

    public function nuevo()
    {
        $tipo = Tipo::pluck('nombre','id');
        $pago = Pago::pluck('nombre','id');
        $compra = Compra::Disponible()->with('producto')->get();
        $cantidad = Compra::Disponible()->sum('cantidad');
        $precio_unitario = Compra::Disponible()->sum('precio_unitario');
        $importe = Compra::Disponible()->sum('importe');
        return view('admin.compra.nuevo', compact(['compra','tipo','pago','cantidad','precio_unitario','importe']));
    }

    public function registrar(RegistrarRequest $request)
    {
        $producto = Compra::Disponible()->get();
        foreach($producto as $row):
            $stock = Producto::where('id',$row->idproducto)->select('stock')->get();
            foreach($stock as $row2):
                Producto::where('id',$row->idproducto)->update(['stock' => $row->cantidad + $row2->stock, 'precio_compra' => $row->precio_unitario]);

                Compra::Disponible()->update([
                'idtipo' => $request->documento,
                'idprovedor' => $request->provedor,
                'idpago' => $request->pago,
                'operacion' => $request->serie.'-'.$request->numero,
                'fecha' => $request->fecha
                ]);
            endforeach;
        endforeach;       

        return redirect('compra')->with('message','Se registro nueva compra');
    }

    public function eliminar($id)
    {
        Compra::where('id',$id)->delete();

        return redirect('compra')->with('eliminar','Compra eliminada');
    }

    public function editar($id)
    {
        $compra = Compra::where('id',$id)->get();
        
        return view('admin.compra.editar', compact('compra'));
    }

    public function actualizar(RegistrarRequest $request)
    {
        Compra::where('id', $request->id)->update(['nombre' => strtoupper($request->nombre)]);

        return redirect('compra')->with('message','Se actualizo compra');
    }

    public function agregarproducto(AgregarProductoRequest $request)
    {
        $data = new Compra();
        $data->idproducto = $request->producto;
        $data->cantidad = $request->cantidad;
        $data->precio_unitario = $request->precio_unitario;
        $data->importe = $request->precio_unitario * $request->cantidad;
        $data->iduser = Auth::user()->id;
        $data->save();

        return redirect('nueva-compra')->with('message','Se agrego producto');
    }

    public function eliminarproducto($id)
    {
        Compra::where('id',$id)->delete();

        return redirect('nueva-compra')->with('eliminar','Producto agregado eliminado');
    }
}
