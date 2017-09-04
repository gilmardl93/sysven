<?php

namespace App\Http\Controllers\Admin\Compras;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\Compra\RegistrarRequest;
use App\Models\Compra;
use App\Models\Tipo;
use App\Models\Pago;

class ComprasController extends Controller
{
    public function index()
    {
        return view('admin.compra.index');
    }

    public function listado()
    {
        $compra = Compra::where('idtipo','<>','')->with(['producto','pago','tipo'])->get();
        $lista['data'] = $compra;
        return $lista;
    }

    public function nuevo()
    {
        $tipo = Tipo::pluck('nombre','id');
        $pago = Pago::pluck('nombre','id');
        $compra = Compra::Disponible()->with('producto')->get();
        $cantidad = Compra::where('iduser', Auth::user()->id)->sum('cantidad');
        $precio_unitario = Compra::where('iduser', Auth::user()->id)->sum('precio_unitario');
        return view('admin.compra.nuevo', compact(['compra','tipo','pago','cantidad','precio_unitario']));
    }

    public function registrar(RegistrarRequest $request)
    {
        Compra::Disponible()->update([
            'idtipo' => $request->documento,
            'idprovedor' => $request->provedor,
            'idpago' => $request->pago,
            'serie' => $request->serie,
            'numero' => $request->numero,
            'fecha' => $request->fecha
        ]);

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

    public function agregarproducto(Request $request)
    {
        $data = new Compra();
        $data->idproducto = $request->producto;
        $data->cantidad = $request->cantidad;
        $data->precio_unitario = $request->precio_unitario;
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
