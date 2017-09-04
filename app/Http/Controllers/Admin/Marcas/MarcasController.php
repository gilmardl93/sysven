<?php

namespace App\Http\Controllers\Admin\Marcas;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Marca\RegistrarRequest;
use App\Models\Marca;

class MarcasController extends Controller
{
    public function index()
    {
        return view('admin.marca.index');
    }

    public function listado()
    {
        $marca = Marca::all();
        $lista['data'] = $marca;
        return $lista;
    }

    public function listadoJson(Request $request)
    {
        $name = $request->varsearch ?:'';
        $name = trim(strtoupper($name));
        $marca = Marca::where('nombre','like',"%$name%")->select('id','nombre as text')->get();
        return $marca;
    }

    public function registrar(RegistrarRequest $request)
    {
        $data = new Marca();
        $data->nombre = strtoupper($request->nombre);
        $data->save();

        return redirect('marca')->with('message','Se registro nueva marca');
    }

    public function eliminar($id)
    {
        Marca::where('id',$id)->delete();

        return redirect('marca')->with('eliminar','Marca eliminada');
    }

    public function editar($id)
    {
        $marca = Marca::where('id',$id)->get();
        
        return view('admin.marca.editar', compact('marca'));
    }

    public function actualizar(RegistrarRequest $request)
    {
        Marca::where('id', $request->id)->update(['nombre' => strtoupper($request->nombre)]);

        return redirect('marca')->with('message','Se actualizo marca');
    }
}
