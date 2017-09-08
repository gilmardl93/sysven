<?php

namespace App\Http\Controllers\Admin\Ventas;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Empresa;
use App\Models\Venta;
use Auth;
use PDF;

class ReportesController extends Controller
{
    public function Header($tipo)
    {
        if($tipo == 1)
        {
            $ultimaSerie = Venta::UltimaSerieBoleta()->max('numero');
            $cliente = Venta::UltimaSerieBoleta()->with('cliente')->get();
        }else if($tipo == 2)
        {
            $ultimaSerie = Venta::UltimaSerieFactura()->max('numero');
            $cliente = Venta::UltimaSerieFactura()->with('cliente')->get();
        }else if($tipo == 3)
        {
            $ultimaSerie = Venta::UltimaSerieTicket()->max('numero');
            $cliente = Venta::UltimaSerieTicket()->with('cliente')->get();
        }
        foreach($cliente as $cli): $cli->first()->razon_social; endforeach;
        $empresa = Empresa::all();
        foreach($empresa as $row):
        PDF::SetFont('','B',9);
        PDF::SetXY(0,4);
        PDF::Cell(105,5,$row->razon_social,0,1,'C');
        PDF::SetXY(0,9);
        PDF::Cell(105,5,'RUC: '.$row->ruc,0,1,'C');
        PDF::SetXY(0,13);
        PDF::Cell(105,5,'Telefono ó Celular: '.$row->telefono1,0,1,'C');
        PDF::SetXY(0,17);
        PDF::Cell(105,5,'Dirección: '.$row->direccion,0,1,'C');
        PDF::SetXY(0,21);
        PDF::Cell(105,5,'Distrito: '.$row->distrito,0,1,'C');
        PDF::SetXY(0,25);
        PDF::Cell(105,5,'Cliente: '.$cli->first()->razon_social,0,1,'C');
        PDF::SetFont('','',12);
        if($tipo == 1)
        {
            PDF::SetXY(0,30);
            PDF::Cell(30,5,'-----------------------------------------------------------------------------------------------------------------------------',0);
            PDF::SetXY(0,35);
            PDF::Cell(105,5,'Boleta: 001 - '.str_pad($ultimaSerie, 6, '0', STR_PAD_LEFT),0,1,'C');
            PDF::SetXY(0,40);
            PDF::Cell(30,5,'-----------------------------------------------------------------------------------------------------------------------------',0);
        }else if($tipo == 2)
        {
            PDF::SetXY(0,30);
            PDF::Cell(30,5,'-----------------------------------------------------------------------------------------------------------------------------',0);
            PDF::SetXY(0,35);
            PDF::Cell(105,5,'Factura: 001 - '.str_pad($ultimaSerie, 6, '0', STR_PAD_LEFT),0,1,'C');
            PDF::SetXY(0,40);
            PDF::Cell(30,5,'-----------------------------------------------------------------------------------------------------------------------------',0);
        }else if($tipo == 3)
        {
            PDF::SetXY(0,30);
            PDF::Cell(30,5,'-----------------------------------------------------------------------------------------------------------------------------',0);
            PDF::SetXY(0,35);
            PDF::Cell(105,5,'Ticket: 001 - '.str_pad($ultimaSerie, 6, '0', STR_PAD_LEFT),0,1,'C');
            PDF::SetXY(0,40);
            PDF::Cell(30,5,'-----------------------------------------------------------------------------------------------------------------------------',0);
        }
        endforeach;
    }

    public function TituloColumnas()
    {
        PDF::SetFont('','B',7);
        PDF::SetXY(3,45);
        PDF::Cell(10,5,'CANT.',0);
        PDF::SetXY(15,45);
        PDF::Cell(95,5,'PRODUCTO',0);
        PDF::SetXY(65,45);
        PDF::Cell(10,5,'P.UNITARIO',0);
        PDF::SetXY(90,45);
        PDF::Cell(30,5,'TOTAL',0);
        PDF::SetXY(0,47);
        PDF::Cell(30,5,'-----------------------------------------------------------------------------------------------------------------------------',0);
        
    }

    public function boleta()
    {
        $ultimaSerie = Venta::UltimaSerieBoleta()->max('numero');
        $detalle = Venta::DetalleSerieBoleta($ultimaSerie)->with(['producto','pago'])->get();
        $total = Venta::DetalleSerieBoleta($ultimaSerie)->sum('monto');
        PDF::SetTitle("BOLETA ");
        PDF::SetAutoPageBreak(false);
        PDF::AddPage('P','A6');
        
        $altodecelda=3;
        $incremento = 50;
        $numMaxLineas = 40;
        $x = 5;
        $y = 0;
        $i = 0;
        $this->Header(1);
        $this->TituloColumnas();
        foreach($detalle as $row):
            if($i%$numMaxLineas==0 && $i!=0){
                PDF::AddPage('R', 'A4');
                HeaderPDF();
                FooterPDF();
                $this->TituloColumnas();
                $y = 0;
            }            
            #
            PDF::SetXY($x+1, $y*$altodecelda+$incremento);
            PDF::SetFont('', '', 7);
            PDF::Cell(5, $altodecelda, $row->cantidad, 0);
            #
            PDF::SetXY($x+10, $y*$altodecelda+$incremento);
            PDF::SetFont('', '', 7);
            PDF::Cell(5,$altodecelda,substr($row->producto->nombre,0,25),0);
            #
            PDF::SetXY($x+65, $y*$altodecelda+$incremento);
            PDF::SetFont('', '', 7);
            PDF::Cell(5,$altodecelda,$row->producto->precio_venta,0);
            #
            PDF::SetXY($x+86, $y*$altodecelda+$incremento);
            PDF::SetFont('', '', 7);
            PDF::Cell(5,$altodecelda,$row->monto,0);

            $y++;
            $i++;
        endforeach;
        PDF::SetFont('','B',7);
        PDF::SetXY(63,130);
        PDF::Cell(25,6,'TIPO DE PAGO :',0,0,'R');
        PDF::SetXY(76,130);
        PDF::Cell(25,6,$row->pago->nombre,0,0,'R');
        PDF::SetXY(0,135);
        PDF::Cell(75,6,'GRACIAS POR SU COMPRA',0,0,'C');
        PDF::SetXY(75,135);
        PDF::Cell(25,6,'TOTAL: S/. '.$total,1,0,'C');
        PDF::Output("boleta.pdf");
    }

    public function ticket()
    {
        $ultimaSerie = Venta::UltimaSerieTicket()->max('numero');
        $detalle = Venta::DetalleSerieTicket($ultimaSerie)->with(['producto','pago'])->get();
        $total = Venta::DetalleSerieTicket($ultimaSerie)->sum('monto');
        PDF::SetTitle("TICKET ");
        PDF::SetAutoPageBreak(false);
        PDF::AddPage('P','A6');
        
        $altodecelda=3;
        $incremento = 50;
        $numMaxLineas = 40;
        $x = 5;
        $y = 0;
        $i = 0;
        $this->Header(3);
        $this->TituloColumnas();
        foreach($detalle as $row):
            if($i%$numMaxLineas==0 && $i!=0){
                PDF::AddPage('R', 'A4');
                HeaderPDF();
                FooterPDF();
                $this->TituloColumnas();
                $y = 0;
            }            
            #
            PDF::SetXY($x+1, $y*$altodecelda+$incremento);
            PDF::SetFont('', '', 7);
            PDF::Cell(5, $altodecelda, $row->cantidad, 0);
            #
            PDF::SetXY($x+10, $y*$altodecelda+$incremento);
            PDF::SetFont('', '', 7);
            PDF::Cell(5,$altodecelda,substr($row->producto->nombre,0,25),0);
            #
            PDF::SetXY($x+65, $y*$altodecelda+$incremento);
            PDF::SetFont('', '', 7);
            PDF::Cell(5,$altodecelda,$row->producto->precio_venta,0);
            #
            PDF::SetXY($x+86, $y*$altodecelda+$incremento);
            PDF::SetFont('', '', 7);
            PDF::Cell(5,$altodecelda,$row->monto,0);

            $y++;
            $i++;
        endforeach;
        PDF::SetFont('','B',7);
        PDF::SetXY(63,130);
        PDF::Cell(25,6,'TIPO DE PAGO :',0,0,'R');
        PDF::SetXY(76,130);
        PDF::Cell(25,6,$row->pago->nombre,0,0,'R');
        PDF::SetXY(0,135);
        PDF::Cell(75,6,'GRACIAS POR SU COMPRA',0,0,'C');
        PDF::SetXY(75,135);
        PDF::Cell(25,6,'TOTAL: S/. '.$total,1,0,'C');
        PDF::Output("ticket.pdf");
    }

    public function factura()
    {
        $ultimaSerie = Venta::UltimaSerieFactura()->max('numero');
        $detalle = Venta::DetalleSerieFactura($ultimaSerie)->with(['producto','pago'])->get();
        $total = Venta::DetalleSerieFactura($ultimaSerie)->sum('monto');
        PDF::SetTitle("FACTURA ");
        PDF::SetAutoPageBreak(false);
        PDF::AddPage('P','A6');
        
        $altodecelda=3;
        $incremento = 50;
        $numMaxLineas = 40;
        $x = 5;
        $y = 0;
        $i = 0;
        $this->Header(2);
        $this->TituloColumnas();
        foreach($detalle as $row):
            if($i%$numMaxLineas==0 && $i!=0){
                PDF::AddPage('R', 'A4');
                HeaderPDF();
                FooterPDF();
                $this->TituloColumnas();
                $y = 0;
            }            
            #
            PDF::SetXY($x+1, $y*$altodecelda+$incremento);
            PDF::SetFont('', '', 7);
            PDF::Cell(5, $altodecelda, $row->cantidad, 0);
            #
            PDF::SetXY($x+10, $y*$altodecelda+$incremento);
            PDF::SetFont('', '', 7);
            PDF::Cell(5,$altodecelda,substr($row->producto->nombre,0,25),0);
            #
            PDF::SetXY($x+65, $y*$altodecelda+$incremento);
            PDF::SetFont('', '', 7);
            PDF::Cell(5,$altodecelda,$row->producto->precio_venta,0);
            #
            PDF::SetXY($x+86, $y*$altodecelda+$incremento);
            PDF::SetFont('', '', 7);
            PDF::Cell(5,$altodecelda,$row->monto,0);

            $y++;
            $i++;
        endforeach;
        PDF::SetFont('','B',7);
        PDF::SetXY(63,121);
        PDF::Cell(25,6,'TIPO DE PAGO :',0,0,'R');
        PDF::SetXY(76,121);
        PDF::Cell(25,6,$row->pago->nombre,0,0,'R');
        PDF::SetXY(67,125);
        PDF::Cell(25,6,'SUBTOTAL: S/.',0,0,'R');
        PDF::SetXY(72,125);
        PDF::Cell(25,6,number_format($row->monto / 1.18, 2, '.', ''),0,0,'R');
        PDF::SetXY(67,129);
        PDF::Cell(25,6,'IGV (18%): S/.',0,0,'R');
        PDF::SetXY(72,129);
        PDF::Cell(25,6,$total - number_format($row->monto / 1.18, 2, '.', ''),0,0,'R');
        PDF::SetXY(0,135);
        PDF::Cell(75,6,'GRACIAS POR SU COMPRA',0,0,'C');
        PDF::SetXY(75,135);
        PDF::Cell(25,6,'TOTAL: S/. '.$total,1,0,'C');
        PDF::SetFont('','',7);
        PDF::Output("factura.pdf");
    }
}
