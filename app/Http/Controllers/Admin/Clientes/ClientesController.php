<?php

namespace App\Http\Controllers\Admin\Clientes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Cliente\RegistrarRequest;
use App\Models\Cliente;

class ClientesController extends Controller
{
    public function index()
    {
        return view('admin.cliente.index');
    }

    public function listado()
    {
        $cliente = Cliente::all();
        $lista['data'] = $cliente;
        return $lista;
    }

    public function listadoJson(Request $request)
    {
        $name = $request->varsearch ?:'';
        $name = trim(strtoupper($name));
        $cliente = Cliente::where('razon_social','like',"%$name%")->select('id','razon_social as text', 'ruc as ruc')->get();
        return $cliente;
    }

    public function registrar(RegistrarRequest $request)
    {
        $data = new Cliente();
        $data->razon_social = strtoupper($request->razon_social);
        $data->ruc = $request->ruc;
        $data->email = $request->email;
        $data->direccion = strtoupper($request->direccion);
        $data->distrito = strtoupper($request->distrito);
        $data->telefono = $request->telefono;
        $data->save();

        return redirect('cliente')->with('message','Se registro nuevo cliente');
    }

    public function eliminar($id)
    {
        Cliente::where('id',$id)->delete();

        return redirect('cliente')->with('eliminar','cliente eliminado');
    }

    public function editar($id)
    {
        $cliente = Cliente::where('id',$id)->get();
        
        return view('admin.cliente.editar', compact('cliente'));
    }

    public function actualizar(RegistrarRequest $request)
    {
        Cliente::where('id', $request->id)->update([
                'razon_social' => strtoupper($request->razon_social),
                'ruc' => $request->ruc,
                'email' => $request->email,
                'direccion' => strtoupper($request->direccion),
                'distrito' => strtoupper($request->distrito),
                'telefono' => $request->telefono,
                ]);

        return redirect('cliente')->with('message','Se actualizo cliente');
    }
}
