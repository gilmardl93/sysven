<?php

namespace App\Http\Controllers\Admin\Categorias;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Categoria\RegistrarRequest;
use App\Models\Categoria;

class CategoriasController extends Controller
{
    public function index()
    {
        return view('admin.categoria.index');
    }

    public function listado()
    {
        $categoria = Categoria::all();
        $lista['data'] = $categoria;
        return $lista;
    }

    public function listadoJson(Request $request)
    {
        $name = $request->varsearch ?:'';
        $name = trim(strtoupper($name));
        $categoria = Categoria::where('nombre','like',"%$name%")->select('id','nombre as text')->get();
        return $categoria;
    }

    public function registrar(RegistrarRequest $request)
    {
        $data = new Categoria();
        $data->nombre = strtoupper($request->nombre);
        $data->save();

        return redirect('categoria')->with('message','Se registro nueva categoria');
    }

    public function eliminar($id)
    {
        Categoria::where('id',$id)->delete();

        return redirect('categoria')->with('eliminar','Categoria eliminada');
    }

    public function editar($id)
    {
        $categoria = Categoria::where('id',$id)->get();
        
        return view('admin.categoria.editar', compact('categoria'));
    }

    public function actualizar(RegistrarRequest $request)
    {
        Categoria::where('id', $request->id)->update(['nombre' => strtoupper($request->nombre)]);

        return redirect('categoria')->with('message','Se actualizo categoria');
    }
}
