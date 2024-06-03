<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;
use App\Http\Requests\Cliente\SolicitudActualizacion;
use App\Http\Requests\Cliente\SolicitudTienda;

class ClienteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can::clientes.create')->only(['create','store']);
        $this->middleware('can::clientes.index')->only(['index']);
        $this->middleware('can::clientes.edit')->only(['edit','update']);
        $this->middleware('can::clientes.show')->only(['show']);
        $this->middleware('can::clientes.destroy')->only(['destroy']);
    }
    public function index()
    {
        $clientes = Cliente::get();
        return view ('admin.cliente.index', compact('clientes'));
    }

    public function create()
    {
        return view ('admin.cliente.create');
    }

    public function store(SolicitudTienda $request)
    {
        Cliente::create($request->all());
        return redirect()->route('clientes.index');
    }

    public function show(Cliente $cliente)
    {
        return view ('admin.cliente.show', compact('cliente'));
    }

    public function edit(Cliente $cliente)
    {
        return view ('admin.cliente.edit', compact('cliente'));
    }

    public function update(SolicitudActualizacion $request, Cliente $cliente)
    {
        $cliente->update($request->all());
        return redirect()->route('clientes.index');
    }

    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return redirect()->route('clientes.index');
    }
}
