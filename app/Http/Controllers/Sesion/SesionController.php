<?php

namespace App\Http\Controllers\Sesion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SesionController extends Controller
{
    public function login(Request $request)
    {
        if(Auth::attempt(['username' => $request->username, 'password' => $request->password, 'activo' => true])) 
        {
            return redirect()->intended('/');
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
