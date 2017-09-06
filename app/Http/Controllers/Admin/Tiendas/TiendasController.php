<?php

namespace App\Http\Controllers\Admin\Tiendas;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tienda\RegistrarRequest;
use App\Models\Tienda;

class TiendasController extends Controller
{
    public function index()
    {
        return view('admin.tienda.index');
    }

    public function listado()
    {
        $tienda = Tienda::all();
        $lista['data'] = $tienda;
        return $lista;
    }

    public function registrar(RegistrarRequest $request)
    {
        $data = new Tienda();
        $data->nombre       = strtoupper($request->nombre);
        $data->direccion    = strtoupper($request->direccion);
        $data->telefono     = strtoupper($request->telefono);
        $data->distrito     = $request->distrito;
        $data->save();

        return redirect('tiendas')->with('message','Se registro nueva tienda');
    }

    public function eliminar($id)
    {
        Tienda::where('id',$id)->delete();

        return redirect('tiendas')->with('eliminar','tienda eliminada');
    }

    public function editar($id)
    {
        $tienda = Tienda::where('id',$id)->get();
        
        return view('admin.tienda.editar', compact('tienda'));
    }

    public function actualizar(RegistrarRequest $request)
    {
        Tienda::where('id', $request->id)->update([
                'nombre'    => strtoupper($request->nombre),
                'direccion' => strtoupper($request->direccion),
                'telefono'  => strtoupper($request->telefono),
                'distrito'  => $request->distrito,
                ]);

        return redirect('tiendas')->with('message','Se actualizo tienda');
    }
}
