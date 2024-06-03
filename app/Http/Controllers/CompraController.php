<?php

namespace App\Http\Controllers;

use App\Compra;
use App\Proveedor;
use App\Producto;
use App\DetalleCompra;
use Illuminate\Http\Request;
use App\Http\Requests\Compra\SolicitudActualizacion;
use App\Http\Requests\Compra\SolicitudTienda;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class CompraController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can::compras.create')->only(['create','store']);
        $this->middleware('can::compras.index')->only(['index']);
        $this->middleware('can::compras.show')->only(['show']);

        $this->middleware('can::cambiar.estado.compras')->only(['cambiar_estado']);
        $this->middleware('can::compras.pdf')->only(['pdf']);
        $this->middleware('can::upload.compras')->only(['upload']);
    }
   public function index()
    {
        $compras = Compra::get();
        return view ('admin.compra.index', compact('compras'));
    }

    public function create()
    {
        $proveedors = Proveedor::get();
        $productos = Producto::where('estado','ACTIVADO')->get();
        return view ('admin.compra.create', compact('proveedors','productos'));
    }

    public function store(SolicitudTienda $request)
    {
        
        $compra = Compra::create($request->all()+[
            'usuario_id'=> Auth::user()->id,
            'fecha_compra'=>Carbon::now('America/La_Paz')
        ]);
        foreach($request->producto_id as $key => $producto){
            $results[] = array("producto_id"=>$request->producto_id[$key],"cantidad"=>$request->cantidad[$key],"precio"=>$request->precio[$key]);
        }
        $compra->detalleCompras()->createMany($results);

        return redirect()->route('compras.index');
    }

    public function show(Compra $compra)
    {
        $subtotal=0;
        $detalleCompras = $compra->detalleCompras;
        foreach ($detalleCompras as $detalleCompra){
            $subtotal += $detalleCompra->cantidad * $detalleCompra->precio;
        }
        return view ('admin.compra.show', compact('compra','detalleCompras','subtotal'));
    }

    public function edit(Compra $compra)
    {
        $proveedors = Proveedor::get();
        return view ('admin.compra.show', compact('compra'));
    }

    public function update(SolicitudActualizacion $request, Compra $compra)
    {
        //$compra->update($request->all());
        //return redirect()->route('compras.index');
    }

    public function destroy(Compra $compra)
    {
        //$compra->delete();
        //return redirect()->route('compras.index');
    }
    public function pdf(Compra $compra)
    {
        $subtotal=0;
        $detalleCompras = $compra->detalleCompras;
        foreach ($detalleCompras as $detalleCompra){
            $subtotal += $detalleCompra->cantidad * $detalleCompra->precio;
        }
        $pdf = PDF::loadView('admin.compra.pdf',compact('compra','subtotal','detalleCompras'));
        return $pdf->download('Reporte_de_compras_'.$compra->id.'.pdf');
    }

    public function upload(Request $reques, Compra $compra)
    {
        //$compra->update($request->all());
        //return redirect()->route('compras.index');
    }

    public function cambiar_estado(Compra $compra)
    {
        if($compra->estado=='VALIDO'){
            $compra->update(['estado'=>'CANCELADO']);
            return redirect()->back();
        }else{
            $compra->update(['estado'=>'VALIDO']);
            return redirect()->back();
        }
    }
    
}
