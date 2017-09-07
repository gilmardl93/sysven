<?php

namespace App\Http\Controllers\Admin\Usuarios;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Usuario\RegistrarRequest;
use App\Models\Tienda;
use App\Models\Rol;
use App\User;

class UsuariosController extends Controller
{
    public function index()
    {
        $tienda = Tienda::pluck('nombre','id');
        $rol = Rol::pluck('nombre','id');
        return view('admin.usuario.index', compact(['tienda','rol']));
    }

    public function listado()
    {
        $usuario = User::with(['tienda','rol'])->get();        
        $lista['data'] = $usuario;
        return $lista;
    }

    public function registrar(RegistrarRequest $request)
    {
        $data = new User();
        $data->nombres = strtoupper($request->nombres);
        $data->paterno = strtoupper($request->paterno);
        $data->materno = strtoupper($request->materno);
        $data->username = $request->username;
        $data->password = bcrypt($request->password);
        $data->rol = $request->rol;
        $data->idtienda = $request->tienda;
        $data->save();

        return redirect('usuario')->with('message','Se registro nuevo usuario');
    }

    public function eliminar($id)
    {
        User::where('id',$id)->delete();

        return redirect('usuario')->with('eliminar','usuario eliminado');
    }

    public function editar($id)
    {
        $usuario = User::where('id',$id)->get();
        
        return view('admin.usuario.editar', compact('usuario'));
    }

    public function actualizar(RegistrarRequest $request)
    {
        User::where('id', $request->id)->update([
                'username' => strtoupper($request->username),
                'password' => bcrypt($request->password),
                'nombres' => strtoupper($request->nombres),
                'paterno' => strtoupper($request->paterno),
                'materno' => strtoupper($request->materno),
                'idtienda' => strtoupper($request->idtienda),
                'idrol' => strtoupper($request->idrol)
                ]);

        return redirect('usuario')->with('message','Se actualizo usuario');
    }
}
