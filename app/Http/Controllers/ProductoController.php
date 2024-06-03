<?php

namespace App\Http\Controllers;

use App\Producto;
use App\Proveedor;
use App\Categoria;
use Illuminate\Http\Request;
use App\Http\Requests\Producto\SolicitudActualizacion;
use App\Http\Requests\Producto\SolicitudTienda;

class ProductoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can::productos.create')->only(['create','store']);
        $this->middleware('can::productos.index')->only(['index']);
        $this->middleware('can::productos.edit')->only(['edit','update']);
        $this->middleware('can::productos.show')->only(['show']);
        $this->middleware('can::productos.destroy')->only(['destroy']);

        $this->middleware('can::cambiar.estado.productos')->only(['cambiar_estado']);
    }
    public function index()
    {
        $productos = Producto::get();
        return view ('admin.producto.index', compact('productos'));
    }

    public function create()
    {
        $categorias = Categoria::get();
        $proveedors = Proveedor::get();
        return view ('admin.producto.create', compact('categorias','proveedors'));
    }

    public function store(SolicitudTienda $request)
    {
        $producto = Producto::create($request->all());
        $producto->update(['codigo'=>$producto->id]);
        return redirect()->route('productos.index');
    }

    public function show(Producto $producto)
    {
        $categorias = Categoria::get();
        $proveedors = Proveedor::get();
        return view ('admin.producto.show', compact('producto','categorias','proveedors'));
    }

    public function edit(Producto $producto)
    {
        $categorias = Categoria::get();
        $proveedors = Proveedor::get();
        return view ('admin.producto.edit', compact('producto','categorias','proveedors'));
    }

    public function update(SolicitudActualizacion $request, Producto $producto)
    {
        
        $producto->update($request->all());
        return redirect()->route('productos.index');
    }

    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('productos.index');
    }

    public function cambiar_estado(Producto $producto)
    {
        if($producto->estado=='ACTIVADO'){
            $producto->update(['estado'=>'DESACTIVADO']);
            return redirect()->back();
        }else{
            $producto->update(['estado'=>'ACTIVADO']);
            return redirect()->back();
        }
    }
}
