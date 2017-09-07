<?php

namespace App\Http\Controllers\Sesion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;

class SesionController extends Controller
{
    public function login(Request $request)
    {
        $tienda = User::where('username', $request->username)->select('idtienda')->count();
        $rol = User::where('username', $request->username)->select('idrol')->count();

        if($tienda == 1 && $rol == 1)
        {
            if(Auth::attempt(['username' => $request->username, 'password' => $request->password, 'activo' => true])) 
            {
                return redirect()->intended('/');
            }else 
            {
                return redirect('login')->with('message','Usuario Inactivo y/o Usuario y contraseña incorrecto');
            }
        }else 
        {
            return redirect('login')->with('message','Usuario Inactivo y/o Usuario y contraseña incorrecto');
        }
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect('login');
    }

    protected function guard()
    {
        return Auth::guard();
    }
}
