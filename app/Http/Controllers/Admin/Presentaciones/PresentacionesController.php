<?php

namespace App\Http\Controllers\Admin\Presentaciones;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Presentacion\RegistrarRequest;
use App\Models\Presentacion;
use Response;

class PresentacionesController extends Controller
{
    public function index()
    {
        return view('admin.presentacion.index');
    }

    public function listado()
    {
        $presentacion = Presentacion::all();
        $lista['data'] = $presentacion;
        return $lista;
    }

    public function listadoJson(Request $request)
    {
        $name = $request->varsearch ?:'';
        $name = trim(strtoupper($name));
        $presentacion = Presentacion::where('nombre','like',"%$name%")->select('id','nombre as text')->get();
        return $presentacion;
    }

    public function registrar(RegistrarRequest $request)
    {
        $data = new Presentacion();
        $data->nombre = strtoupper($request->nombre);
        $data->save();

        return redirect('presentacion')->with('message','Se registro nueva presentacion');
    }

    public function eliminar($id)
    {
        Presentacion::where('id',$id)->delete();

        return redirect('presentacion')->with('eliminar','presentacion eliminada');
    }

    public function editar($id)
    {
        $presentacion = Presentacion::where('id',$id)->get();
        
        return view('admin.presentacion.editar', compact('presentacion'));
    }

    public function actualizar(RegistrarRequest $request)
    {
        Presentacion::where('id', $request->id)->update(['nombre' => strtoupper($request->nombre)]);

        return redirect('presentacion')->with('message','Se actualizo presentacion');
    }
}
