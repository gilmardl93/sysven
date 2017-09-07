<?php

namespace App\Http\Controllers\Admin\Ventas;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\Venta\ClienteRequest;
use App\Http\Requests\Admin\Venta\AnularBoletaRequest;
use App\Models\Venta;
use App\Models\Tipo;
use App\Models\Pago;
use App\Models\Producto;
use App\Models\Caja;
use DB;

class VentasController extends Controller
{
    public function index()
    {
        $caja = Caja::AperturaAbierta()->count();
        return view('admin.venta.index', compact('caja'));
    }

    public function listado()
    {
        $venta = Venta::where('numero','<>','')->with(['producto'])->get();
        $lista['data'] = $venta;
        return $lista;
    }

    public function boleta()
    {
        $max   = Venta::where('idtipo',1)->max('numero');
        $venta = Venta::Disponible()->with('producto')->get();
        $monto  = Venta::Disponible()->sum('monto');
        return view('admin.venta.boleta', compact(['venta',  'max', 'monto']));
    }

    public function registrarProductoBoleta(Request $request)
    {
        $stock = Producto::where('id',$request->producto)->get();
        foreach($stock as $row):
            if($row->stock >= $request->cantidad)
            {
                $data = new Venta();
                $data->idproducto = $request->producto;
                $data->cantidad = $request->cantidad;
                $data->monto = $request->cantidad * $row->precio_venta;
                $data->idusuario = Auth::user()->id;
                $data->save();

                return redirect('boleta')->with('message','Se agrego productos');
            }else 
            {
                return redirect('boleta')->with('eliminar','La cantidad ingresada sobre pasa el stock disponible');
            }
        endforeach;
    }

    public function eliminarProductoBoleta($id)
    {
        Venta::where('id',$id)->delete();

        return redirect('boleta')->with('eliminar','Producto Eliminado');
    }

    public function registrarBoleta(Request $request)
    {
        $producto = Venta::Disponible()->get();
        foreach($producto as $row):
            Producto::where('id',$row->idproducto)->decrement('stock',$row->cantidad);
        endforeach;
        $numero = Venta::where('idtipo',1)->max('numero');
        $productos = Venta::Disponible()->update([
            'numero'    => $numero + 1,
            'idtipo'    => 1,
            'idcliente' => $request->idcliente,
            'idtienda'  => Auth::user()->idtienda,
            'fecha'     => date('Y-m-d H:i:s')
        ]);

        return redirect('boleta')->with('message','Se registro nueva boleta');
    }

    public function factura()
    {
        $max   = Venta::where('idtipo',2)->max('numero');
        $venta = Venta::Disponible()->with('producto')->get();
        $monto  = Venta::Disponible()->sum('monto');
        return view('admin.venta.factura', compact(['venta',  'max', 'monto']));
    }

    public function registrarProductoFactura(Request $request)
    {
        $stock = Producto::where('id',$request->producto)->get();
        foreach($stock as $row):
            if($row->stock >= $request->cantidad)
            {
                $data = new Venta();
                $data->idproducto = $request->producto;
                $data->cantidad = $request->cantidad;
                $data->monto = $request->cantidad * $row->precio_venta;
                $data->idusuario = Auth::user()->id;
                $data->save();

                return redirect('factura')->with('message','Se agrego productos');
            }else 
            {
                return redirect('factura')->with('eliminar','La cantidad ingresada sobre pasa el stock disponible');
            }
        endforeach;
    }

    public function eliminarProductoFactura($id)
    {
        Venta::where('id',$id)->delete();

        return redirect('factura')->with('eliminar','Producto Eliminado');
    }

    public function registrarFactura(ClienteRequest $request)
    {
        $producto = Venta::Disponible()->get();
        foreach($producto as $row):
            Producto::where('id',$row->idproducto)->decrement('stock',$row->cantidad);
        endforeach;
        $numero = Venta::where('idtipo',2)->max('numero');
        $productos = Venta::Disponible()->update([
            'numero'    => $numero + 1,
            'idtipo'    => 2,
            'idcliente' => $request->idcliente,
            'idtienda'  => Auth::user()->idtienda,
            'fecha'     => date('Y-m-d H:i:s')
        ]);

        return redirect('boleta')->with('message','Se registro nueva factura');
    }

    public function ticket()
    {
        $max   = Venta::where('idtipo',3)->max('numero');
        $venta = Venta::Disponible()->with('producto')->get();
        $monto  = Venta::Disponible()->sum('monto');
        return view('admin.venta.ticket', compact(['venta',  'max', 'monto']));
    }

    public function registrarProductoTicket(Request $request)
    {
        $stock = Producto::where('id',$request->producto)->get();
        foreach($stock as $row):
            if($row->stock >= $request->cantidad)
            {
                $data = new Venta();
                $data->idproducto = $request->producto;
                $data->cantidad = $request->cantidad;
                $data->monto = $request->cantidad * $row->precio_venta;
                $data->idusuario = Auth::user()->id;
                $data->save();

                return redirect('ticket')->with('message','Se agrego productos');
            }else 
            {
                return redirect('ticket')->with('eliminar','La cantidad ingresada sobre pasa el stock disponible');
            }
        endforeach;
    }

    public function eliminarProductoTicket($id)
    {
        Venta::where('id',$id)->delete();

        return redirect('ticket')->with('eliminar','Producto Eliminado');
    }

    public function registrarTicket(Request $request)
    {
        $producto = Venta::Disponible()->get();
        foreach($producto as $row):
            Producto::where('id',$row->idproducto)->decrement('stock',$row->cantidad);
        endforeach;
        $numero = Venta::where('idtipo',3)->max('numero');
        $productos = Venta::Disponible()->update([
            'numero'    => $numero + 1,
            'idtipo'    => 3,
            'idcliente' => $request->idcliente,
            'idtienda'  => Auth::user()->idtienda,
            'fecha'     => date('Y-m-d H:i:s')
        ]);

        return redirect('ticket')->with('message','Se registro nuevo ticket');
    }

    public function anular()
    {
        return view('admin.venta.anular');
    }

    public function anularBoleta()
    {
        return view('admin.venta.anular_boleta');
    }

    public function BoletaAnulada(AnularBoletaRequest $request)
    {
        $existe = Venta::ExisteBoleta($request->numero)->count();
        if($existe >= 1)
        {
            $motivo = Venta::ExisteBoleta($request->numero)->update(['motivo' => $request->motivo , 'anulado' => true ]);
            return redirect('anular-boleta')->with('eliminar','Se anulo Boleta: 001-'.str_pad($request->numero, 6, "0", STR_PAD_LEFT));
        }else
        {
            return redirect('anular-boleta')->with('eliminar','El numero de boleta no existe. Ingrese nuevamente.');
        }
    }

    public function anularFactura()
    {
        return view('admin.venta.anular_factura');
    }

    public function FacturaAnulada(AnularBoletaRequest $request)
    {
        $existe = Venta::ExisteFactura($request->numero)->count();
        if($existe >= 1)
        {
            $motivo = Venta::ExisteBoleta($request->numero)->update(['motivo' => $request->motivo , 'anulado' => true ]);
            return redirect('anular-factura')->with('eliminar','Se anulo Boleta: 001-'.str_pad($request->numero, 6, "0", STR_PAD_LEFT));
        }else
        {
            return redirect('anular-factura')->with('eliminar','El numero de boleta no existe. Ingrese nuevamente.');
        }
    }

    public function anularTicket()
    {
        return view('admin.venta.anular_ticket');
    }

    public function TicketAnulada(AnularBoletaRequest $request)
    {
        $existe = Venta::ExisteTicket($request->numero)->count();
        if($existe >= 1)
        {
            $motivo = Venta::ExisteBoleta($request->numero)->update(['motivo' => $request->motivo , 'anulado' => true ]);
            return redirect('anular-ticket')->with('eliminar','Se anulo Boleta: 001-'.str_pad($request->numero, 6, "0", STR_PAD_LEFT));
        }else
        {
            return redirect('anular-ticket')->with('eliminar','El numero de boleta no existe. Ingrese nuevamente.');
        }
    }
}
