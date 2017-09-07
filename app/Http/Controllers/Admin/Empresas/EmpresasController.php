<?php

namespace App\Http\Controllers\Admin\Empresas;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Empresa\RegistrarRequest;
use App\Models\Empresa;

class EmpresasController extends Controller
{
    public function index()
    {
        $empresa = Empresa::all(); 
        return view('admin.empresa.index', compact('empresa'));
    }

    public function registrar(RegistrarRequest $request)
    {
        $data = new Empresa();
        $data->razon_social = strtoupper($request->razon_social);
        $data->ruc = $request->ruc;
        $data->telefono1 = $request->telefono1;
        $data->telefono2 = $request->telefono2;
        $data->email = $request->email;
        $data->pagina_web = $request->pagina_web;
        $data->direccion = strtoupper($request->direccion);
        $data->distrito = strtoupper($request->distrito);
        $data->save();

        return redirect('empresa')->with('message','Se registro nuevo empresa');
    }

    public function editar($id)
    {
        $empresa = Empresa::where('id',$id)->get();
        
        return view('admin.empresa.editar', compact('empresa'));
    }

    public function actualizar(RegistrarRequest $request)
    {
        Empresa::where('id', $request->id)->update([
                    'razon_social' => strtoupper($request->razon_social),
                    'ruc'   => $request->ruc,
                    'telefono1' => $request->telefono1,
                    'telefono2' => $request->telefono2,
                    'email' => $request->email,
                    'pagina_web' => $request->pagina_web,
                    'direccion' => strtoupper($request->direccion),
                    'distrito' => strtoupper($request->distrito)
                    ]);
        return redirect('empresa')->with('message','Se actualizo empresa');
    }
}
