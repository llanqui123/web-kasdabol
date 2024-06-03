<?php

namespace App\Http\Controllers;

use App\Prediccion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Business;

class PrediccionController extends Controller
{
    public function index(Prediccion $prediccion)
    {
        $prediccion = Prediccion::where('id',1)->firstOrFail();
        $response = Http::get('http://127.0.0.1:4000/prediccion');
        $datos = $response->json('demanda');
        $datosPrediccion = $datos[0]['prediccion'];
        $datosDemanda = $datos[1]['demanda'];
        $datosPrediccion2 = $datos[2]['predllantas'];
        $datosDemanda2 = $datos[3]['llantas'];
        return view ('admin.prediccion.index', compact('datosDemanda', 'datosPrediccion','datosDemanda2' ,'datosPrediccion2','prediccion'));
    }

    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
    }
    public function show(Prediccion $prediccion)
    {
        //
    }
    public function edit(Prediccion $prediccion)
    {
        //
    }
    public function update(Request $request, Prediccion $prediccion)
    {
        //
    }
    public function destroy(Prediccion $prediccion)
    {
        //
    }
}
