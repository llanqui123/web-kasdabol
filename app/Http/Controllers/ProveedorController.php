<?php

namespace App\Http\Controllers;

use App\Proveedor;
use Illuminate\Http\Request;
use App\Http\Requests\Proveedor\SolicitudActualizacion;
use App\Http\Requests\Proveedor\SolicitudTienda;

class ProveedorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can::proveedors.create')->only(['create','store']);
        $this->middleware('can::proveedors.index')->only(['index']);
        $this->middleware('can::proveedors.edit')->only(['edit','update']);
        $this->middleware('can::proveedors.show')->only(['show']);
        $this->middleware('can::proveedors.destroy')->only(['destroy']);
    }
    public function index()
    {
        $proveedors = Proveedor::get();
        return view ('admin.proveedor.index', compact('proveedors'));
    }

    public function create()
    {
        return view ('admin.proveedor.create');
    }

    public function store(SolicitudTienda $request)
    {
        Proveedor::create($request->all());
        return redirect()->route('proveedors.index');
    }

    public function show(Proveedor $proveedor)
    {
        return view ('admin.proveedor.show', compact('proveedor'));
    }

    public function edit(Proveedor $proveedor)
    {
        return view ('admin.proveedor.edit', compact('proveedor'));
    }

    public function update(SolicitudActualizacion $request, Proveedor $proveedor)
    {
        $proveedor->update($request->all());
        return redirect()->route('proveedors.index');
    }

    public function destroy(Proveedor $proveedor)
    {
        $proveedor->delete();
        return redirect()->route('proveedors.index');
    }
}
