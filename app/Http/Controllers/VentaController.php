<?php

namespace App\Http\Controllers;

use App\Venta;
use App\Cliente;
use App\Producto;
use App\DetalleVenta;
use Illuminate\Http\Request;
use App\Http\Requests\Venta\SolicitudActualizacion;
use App\Http\Requests\Venta\SolicitudTienda;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

class VentaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can::ventas.create')->only(['create','store']);
        $this->middleware('can::ventas.index')->only(['index']);
        $this->middleware('can::ventas.show')->only(['show']);

        $this->middleware('can::cambiar.estado.ventas')->only(['cambiar_estado']);
        $this->middleware('can::ventas.pdf')->only(['pdf']);
    }
    public function index()
    {
        $ventas = Venta::get();
        return view ('admin.venta.index', compact('ventas'));
    }

    public function create()
    {
        $clientes = Cliente::get();
        $productos = Producto::get();
        return view ('admin.venta.create', compact('clientes','productos'));
    }

    public function store(SolicitudTienda $request)
    {
        $venta = Venta::create($request->all()+[
            'usuario_id'=> Auth::user()->id,
            'fecha_venta'=>Carbon::now('America/La_Paz')
        ]);

        foreach($request->producto_id as $key => $product){
            $results[] = array("producto_id"=>$request->producto_id[$key],"cantidad"=>$request->cantidad[$key],"precio"=>$request->precio[$key],"descuento"=>$request->descuento[$key]);
        }
        $venta->detalleVentas()->createMany($results);

        return redirect()->route('ventas.index');
    }

    public function show(Venta $venta)
    {
        $subtotal=0;
        $detalleVentas = $venta->detalleVentas;
        foreach ($detalleVentas as $detalleVenta){
            $subtotal += $detalleVenta->cantidad * $detalleVenta->precio - $detalleVenta->cantidad * $detalleVenta->precio*$detalleVenta->descuento/100;
        }
        return view ('admin.venta.show', compact('venta','detalleVentas','subtotal'));
    }

    public function edit(Venta $venta)
    {
        $clientes = Cliente::get();
        return view ('admin.venta.show', compact('venta'));
    }

    public function update(SolicitudActualizacion $request, Venta $venta)
    {
        //$venta->update($request->all());
        //return redirect()->route('ventas.index');
    }

    public function destroy(Venta $venta)
    {
        //$venta->delete();
        //return redirect()->route('ventas.index');
    }
    public function pdf(Venta $venta)
    {

        $subtotal=0;
        $detalleVentas = $venta->detalleVentas;
        foreach ($detalleVentas as $detalleVenta){
            $subtotal += $detalleVenta->cantidad * $detalleVenta->precio - $detalleVenta->cantidad * $detalleVenta->precio*$detalleVenta->descuento/100;
        }
        $pdf = PDF::loadView('admin.venta.pdf',compact('venta','subtotal','detalleVentas'));
        return $pdf->download('Reporte_de_venta_'.$venta->id.'.pdf');
    }
    public function print(Venta $venta){

        /* try {
            $subtotal=0;
            $detalleVentas = $venta->detalleVentas;
            foreach ($detalleVentas as $detalleVenta){
                $subtotal += $detalleVenta->cantidad * $detalleVenta->precio - $detalleVenta->cantidad * $detalleVenta->precio*$detalleVenta->descuento/100;
            }


            $printer_name = "TM20";
            $connector = new WindowsPrintConnector($printer_name);
            $printer = new Printer($connector);
             
            $printer->text("€ 9,95\n");

            $printer->cut();
            $printer->close();

            return redirect()->back();

        }catch(Throwable $th){
            return redirect()->back();
        } */

        $connector = new FilePrintConnector("php://stdout");
        $printer = new Printer($connector);
        $printer -> text("Hello World!\n");
        $printer -> cut();
        $printer -> close();
        
    }

    public function cambiar_estado(Venta $venta)
    {
        if($venta->estado=='VALIDO'){
            $venta->update(['estado'=>'CANCELADO']);
            return redirect()->back();
        }else{
            $venta->update(['estado'=>'VALIDO']);
            return redirect()->back();
        }
    }
}
