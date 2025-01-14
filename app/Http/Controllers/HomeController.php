<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        View::share('user', Auth::user());
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $user = Auth::user();

        $comprasmes=DB::select('SELECT monthname(c.fecha_compra) as mes, sum(c.total) as 
        totalmes from compras c where c.estado = "VALIDO" group by monthname(c.fecha_compra) 
        order by month(c.fecha_compra) desc limit 12');

        $ventasmes = DB::select('SELECT monthname(v.fecha_venta) as mes, sum(v.total) as 
        totalmes from ventas v where v.estado = "VALIDO" group by monthname(v.fecha_venta) 
        order by month(v.fecha_venta) desc limit 12');
        

        $ventasdia = DB::select('SELECT DATE_FORMAT(v.fecha_venta,"%d/%m/%Y") as dia, sum(v.total) as 
        totaldia from ventas v where v.estado = "VALIDO" group by v.fecha_venta  
        order by day(v.fecha_venta) desc limit 15');
        

        $totales = DB::select('SELECT (select ifnull(sum(c.total),0) from compras c where DATE 
        (c.fecha_compra)=curdate() and c.estado="VALIDO") as totalcompra, (select ifnull( sum(v.total),0) 
        from ventas v where DATE(v.fecha_venta)=curdate() and v.estado="VALIDO") as 
        totalventa');
        

        $productosvendidos = DB::select('SELECT p.codigo as codigo,
        sum(dv.cantidad) as cantidad, p.nombre as nombre , p.id as id , p.stock as stock from
        productos p
        inner join detalle_ventas dv on p.id=dv.producto_id
        inner join ventas v on dv.venta_id = v.id where v.estado = "VALIDO"
        and year(v.fecha_venta)= year(curdate())
        group by p.codigo, p.nombre, p.id, p.stock order by sum(dv.cantidad) desc limit 10');

        return view('home', compact('comprasmes','ventasmes','ventasdia','totales','productosvendidos'));
    }
}
