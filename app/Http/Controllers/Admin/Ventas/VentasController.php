<?php

namespace App\Http\Controllers\Admin\Ventas;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\Venta\AgregarProductoRequest;
use App\Models\Venta;
use App\Models\Tipo;
use App\Models\Pago;
use App\Models\Producto;
use DB;

class VentasController extends Controller
{
    public function index()
    {
        return view('admin.venta.index');
    }

    public function listado()
    {
        $venta = Venta::where('numero','<>','')->with(['producto'])->get();
        $lista['data'] = $venta;
        return $lista;
    }

    public function nuevo()
    {
        $tipo = Tipo::pluck('nombre','id');
        $pago = Pago::pluck('nombre','id');
        $venta = Venta::Disponible()->with('producto')->get();
        $monto = Venta::Disponible()->sum('monto');
        return view('admin.venta.nuevo', compact(['venta','tipo','pago','monto']));
    }

    public function registrar(RegistrarRequest $request)
    {
        $producto = Venta::Disponible()->get();
        foreach($producto as $row):
            Producto::where('id',$row->idproducto)->update(['stock' => $row->cantidad, 'precio_venta' => $row->precio_unitario]);

            Venta::Disponible()->update([
            'idtipo' => $request->documento,
            'idprovedor' => $request->provedor,
            'idpago' => $request->pago,
            'operacion' => $request->serie.'-'.$request->numero,
            'fecha' => $request->fecha
        ]);
        endforeach;       

        return redirect('venta')->with('message','Se registro nueva venta');
    }

    public function eliminar($id)
    {
        Venta::where('id',$id)->delete();

        return redirect('venta')->with('eliminar','Venta anulada');
    }

    public function editar($id)
    {
        $venta = Venta::where('id',$id)->get();
        
        return view('admin.venta.editar', compact('venta'));
    }

    public function actualizar(RegistrarRequest $request)
    {
        Venta::where('id', $request->id)->update(['nombre' => strtoupper($request->nombre)]);

        return redirect('venta')->with('message','Se actualizo venta');
    }

    public function agregarproducto(Request $request)
    {
        
        $producto = Producto::where('id',$request->producto)->get();
        foreach($producto as $row):
            $data = new Venta();
            $data->idproducto = $request->producto;
            $data->cantidad = $request->cantidad;
            $data->monto = $row->precio_venta * $request->cantidad;
            $data->idusuario = Auth::user()->id;
            $data->save();

            return redirect('nueva-venta')->with('message','Se agrego producto');
        endforeach;
    }

    public function eliminarproducto($id)
    {
        Venta::where('id',$id)->delete();

        return redirect('nueva-venta')->with('eliminar','Producto agregado eliminado');
    }
}
