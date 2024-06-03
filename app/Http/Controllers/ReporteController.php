<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Venta;
use Carbon\Carbon;

class ReporteController extends Controller
{
    public function __construct()
    {

        $this->middleware('can::reporte.dia')->only(['reportes_dia']);
        $this->middleware('can::reporte.fecha')->only(['reportes_fecha']);
    }
    public function reportes_dia(){
        $ventas = Venta::whereDate('fecha_venta', Carbon::today('America/La_Paz'))->get();

        $total = $ventas->sum('total');
        return view ('admin.reporte.reportes_dia', compact('ventas','total'));
    }
    public function reportes_fecha(){
        $ventas = Venta::whereDate('fecha_venta', Carbon::today('America/La_Paz'))->get();
        $total = $ventas->sum('total');
        
        return view ('admin.reporte.reportes_fecha', compact('ventas','total'));
    }
    public function reporte_resultados(Request $request){
        $fi= $request->fecha_ini.' 00:00:00';
        $ff= $request->fecha_fin.' 23:59:59';


        $ventas = Venta::whereBetween('fecha_venta', [$fi,$ff])->get();


        $total = $ventas->sum('total');

        return view ('admin.reporte.reportes_fecha', compact('ventas','total'));
    }
}
