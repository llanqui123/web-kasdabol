<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;
use App\Http\Requests\Categoria\SolicitudActualizacion;
use App\Http\Requests\Categoria\SolicitudTienda;

class CategoriaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can::categorias.create')->only(['create','store']);
        $this->middleware('can::categorias.index')->only(['index']);
        $this->middleware('can::categorias.edit')->only(['edit','update']);
        $this->middleware('can::categorias.show')->only(['show']);
        $this->middleware('can::categorias.destroy')->only(['destroy']);
    }
    public function index()
    {
        $categorias = Categoria::get();
        return view ('admin.categoria.index', compact('categorias'));
    }

    public function create()
    {
        return view ('admin.categoria.create');
    }

    public function store(SolicitudTienda $request)
    {
        Categoria::create($request->all());
        return redirect()->route('categorias.index');
    }

    public function show(Categoria $categoria)
    {
        return view ('admin.categoria.show', compact('categoria'));
    }

    public function edit(Categoria $categoria)
    {
        return view ('admin.categoria.edit', compact('categoria'));
    }

    public function update(SolicitudActualizacion $request, Categoria $categoria)
    {
        $categoria->update($request->all());
        return redirect()->route('categorias.index');
    }

    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return redirect()->route('categorias.index');
    }
}
