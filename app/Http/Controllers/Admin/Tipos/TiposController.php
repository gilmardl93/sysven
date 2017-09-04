<?php

namespace App\Http\Controllers\Admin\Tipos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tipo\RegistrarRequest;
use App\Models\Tipo;

class TiposController extends Controller
{
    public function index()
    {
        return view('admin.tipo.index');
    }

    public function listado()
    {
        $tipo = Tipo::all();
        $lista['data'] = $tipo;
        return $lista;
    }

    public function registrar(RegistrarRequest $request)
    {
        $data = new Tipo();
        $data->nombre = strtoupper($request->nombre);
        $data->save();

        return redirect('tipo')->with('message','Se registro nuevo tipo');
    }

    public function eliminar($id)
    {
        Tipo::where('id',$id)->delete();

        return redirect('tipo')->with('eliminar','tipo eliminado');
    }

    public function editar($id)
    {
        $tipo = Tipo::where('id',$id)->get();
        
        return view('admin.tipo.editar', compact('tipo'));
    }

    public function actualizar(RegistrarRequest $request)
    {
        Tipo::where('id', $request->id)->update(['nombre' => strtoupper($request->nombre)]);

        return redirect('tipo')->with('message','Se actualizo tipo');
    }
}
