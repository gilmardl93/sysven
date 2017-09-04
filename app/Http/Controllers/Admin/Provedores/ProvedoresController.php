<?php

namespace App\Http\Controllers\Admin\Provedores;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Provedor\RegistrarRequest;
use App\Models\Provedor;

class ProvedoresController extends Controller
{
    public function index()
    {
        return view('admin.provedor.index');
    }

    public function listado()
    {
        $provedor = Provedor::all();
        $lista['data'] = $provedor;
        return $lista;
    }

    public function listadoJson(Request $request)
    {
        $name = $request->varsearch ?:'';
        $name = trim(strtoupper($name));
        $provedor = Provedor::where('razon_social','like',"%$name%")->select('id','razon_social as text')->get();
        return $provedor;
    }

    public function nuevo()
    {
        return view('admin.provedor.registrar');
    }

    public function registrar(RegistrarRequest $request)
    {
        $data = new Provedor();
        $data->razon_social = strtoupper($request->razon_social);
        $data->ruc = $request->ruc;
        $data->telefono1 = $request->telefono1;
        $data->telefono2 = $request->telefono2;
        $data->email = $request->email;
        $data->pagina_web = $request->pagina_web;
        $data->direccion = strtoupper($request->direccion);
        $data->distrito = strtoupper($request->distrito);
        $data->save();

        return redirect('provedor')->with('message','Se registro nuevo provedor');
    }

    public function eliminar($id)
    {
        Provedor::where('id',$id)->delete();

        return redirect('provedor')->with('eliminar','provedor eliminado');
    }

    public function editar($id)
    {
        $provedor = Provedor::where('id',$id)->get();
        
        return view('admin.provedor.editar', compact('provedor'));
    }

    public function actualizar(RegistrarRequest $request)
    {
        Provedor::where('id', $request->id)->update([
                    'razon_social' => strtoupper($request->razon_social),
                    'ruc'   => $request->ruc,
                    'telefono1' => $request->telefono1,
                    'telefono2' => $request->telefono2,
                    'email' => $request->email,
                    'pagina_web' => $request->pagina_web,
                    'direccion' => strtoupper($request->direccion),
                    'distrito' => strtoupper($request->distrito)
                    ]);
        return redirect('provedor')->with('message','Se actualizo provedor');
    }
}
