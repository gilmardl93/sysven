<?php

namespace App\Http\Controllers\Admin\Cajas;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Caja\AperturarRequest;
use App\Models\Caja;
use Auth;

class CajasController extends Controller
{
    public function index()
    {
        $caja = Caja::AperturaAbierta()->count();
        return view('admin.caja.index', compact('caja'));
    }

    public function aperturar(AperturarRequest $request)
    {
        $data = new Caja();
        $data->hora_inicio = date("H:i:s");
        $data->monto_inicial = $request->monto_inicial;
        $data->idusuario = Auth::user()->id;
        $data->save();
        return redirect('aperturar-caja')->with('message','Se aperturo Caja');
    }

    public function cerrar()
    {
        Caja::AperturaAbierta()->update(['hora_cierre' => date("H:i:s")]);
        return redirect('aperturar-caja')->with('message','Se cerro Caja');
    }
}
