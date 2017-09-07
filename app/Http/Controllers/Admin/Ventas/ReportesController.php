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
    public function Header()
    {
        $ultimaSerie = Venta::UltimaSerieBoleta()->max('numero');
        $empresa = Empresa::all();
        foreach($empresa as $row):
        PDF::SetFont('','B',10);
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
        PDF::SetFont('','',10);
        PDF::SetXY(0,28);
        PDF::Cell(30,5,'-----------------------------------------------------------------------------------------------------------------------------',0);
        PDF::SetXY(0,33);
        PDF::Cell(105,5,'Boleta: 001 - '.str_pad($ultimaSerie, 6, '0', STR_PAD_LEFT),0,1,'C');
        PDF::SetXY(0,38);
        PDF::Cell(30,5,'-----------------------------------------------------------------------------------------------------------------------------',0);

        endforeach;
    }

    public function TituloColumnas()
    {
        PDF::SetFont('','B',7);
        PDF::SetXY(2,45);
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
        $detalle = Venta::DetalleSerieBoleta($ultimaSerie)->with(['producto'])->get();
        PDF::SetTitle("BOLETA ");
        PDF::SetAutoPageBreak(false);
        PDF::AddPage('P','A6');
        
        $altodecelda=3;
        $incremento = 50;
        $numMaxLineas = 40;
        $x = 5;
        $y = 0;
        $i = 0;
        $this->Header();
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
            PDF::SetXY($x+0, $y*$altodecelda+$incremento);
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
        PDF::Output("boleta.pdf");
    }
}
