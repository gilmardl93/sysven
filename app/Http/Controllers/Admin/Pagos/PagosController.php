<?php

namespace App\Http\Controllers\Admin\Pagos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Pago\RegistrarRequest;
use App\Models\Pago;

class PagosController extends Controller
{
    public function index()
    {
        return view('admin.pago.index');
    }

    public function listado()
    {
        $pago = Pago::all();
        $lista['data'] = $pago;
        return $lista;
    }

    public function registrar(RegistrarRequest $request)
    {
        $data = new Pago();
        $data->nombre = strtoupper($request->nombre);
        $data->save();

        return redirect('pago')->with('message','Se registro nuevo pago');
    }

    public function eliminar($id)
    {
        Pago::where('id',$id)->delete();

        return redirect('pago')->with('eliminar','pago eliminado');
    }

    public function editar($id)
    {
        $pago = Pago::where('id',$id)->get();
        
        return view('admin.pago.editar', compact('pago'));
    }

    public function actualizar(RegistrarRequest $request)
    {
        Pago::where('id', $request->id)->update(['nombre' => strtoupper($request->nombre)]);

        return redirect('pago')->with('message','Se actualizo pago');
    }
}
