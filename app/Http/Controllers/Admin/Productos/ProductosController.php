<?php

namespace App\Http\Controllers\Admin\Productos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Producto\RegistrarRequest;
use App\Models\Producto;
use App\Models\Marca;
use App\Models\Categoria;
use App\Models\Presentacion;
use App\Models\Compra;

class ProductosController extends Controller
{
    public function index()
    {
        return view('admin.producto.index');
    }

    public function listado()
    {
        $producto = Producto::with(['marca','presentacion','categoria'])->get();
        $lista['data'] = $producto;
        return $lista;
    }

    public function listadoJson(Request $request)
    {
        $name = $request->varsearch ?:'';
        $name = trim(strtoupper($name));
        $producto = Producto::select('producto.id','producto.nombre as text','presentacion.nombre as pre')
                        ->join('presentacion','presentacion.id','=','producto.idpresentacion')
                        ->where('producto.nombre','like',"%$name%")->get();     
        return $producto;
    }

    public function listadoDisponibleJson(Request $request)
    {
        $name = $request->varsearch ?:'';
        $name = trim(strtoupper($name));
        $producto = Producto::select('producto.id','producto.nombre as text','presentacion.nombre as pre')
                        ->join('presentacion','presentacion.id','=','producto.idpresentacion')
                        ->where('producto.nombre','like',"%$name%")
                        ->where('stock','<>','')
                        ->where('precio_unitario','<>','')
                        ->get();     
        return $producto;
    }

    public function nuevo()
    {
        return view('admin.producto.registrar');
    }

    public function registrar(RegistrarRequest $request)
    {
        $data = new Producto();
        $data->codigo = strtoupper($request->codigo);
        $data->nombre = strtoupper($request->nombre);
        $data->precio_venta = $request->precio_venta;
        $data->idcategoria = $request->categoria;
        $data->idmarca = $request->marca;
        $data->idpresentacion = $request->presentacion;
        $data->fecha = date('Y-m-d');
        $data->save();

        return redirect('producto')->with('message','Se registro nuevo producto');
    }

    public function eliminar($id)
    {
        Producto::where('id',$id)->delete();

        return redirect('producto')->with('eliminar','producto eliminado');
    }

    public function editar($id)
    {
        $producto = Producto::where('id',$id)->get();
        
        return view('admin.producto.editar', compact('producto'));
    }

    public function actualizar(RegistrarRequest $request)
    {
        Producto::where('id', $request->id)->update([
                'nombre' => strtoupper($request->nombre),
                'codigo' => $request->codigo,
                'precio_venta' => $request->precio_venta,
                'idpresentacion' => $request->presentacion,
                'idcategoria' => $request->categoria,
                'idmarca' => $request->marca
                ]);

        return redirect('producto')->with('message','Se actualizo producto');
    }
}
