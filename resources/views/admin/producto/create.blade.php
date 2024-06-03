@extends('layouts.admin')
@section('title', 'Registro producto')
@section('styles')

@section('create')
<li class="nav-item d-none d-lg-flex">
    <a href="{{route('categorias.create')}}" class="nav-link"><span class="btn btn-primary">+Crear Nuevo</span></a>
</li>
@endsection

@endsection
@section('options')

@endsection
@section('preference')

@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">
        Registro de Productos
      </h3>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Panel de administrador</a></li>
            <li class="breadcrumb-item"><a href="{{route('categorias.index')}}">Productos</a></li>
            <li class="breadcrumb-item active" aria-current="page"> Registro de Productos</li>
        </ol>
      </nav>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    {{--<h4 class="card-title">Productos</h4>--}}
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title"> Registro de Productos</h4>
                    </div>
                    {!! Form::open(['route'=>'productos.store','method'=>'POST']) !!}

                    <div class="form-group">
                      <label for="nombre">Nombre</label>
                      <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="helpId" >
                    </div>
                    <div class="form-group">
                        <label for="precio_venta">Precio de Venta</label>
                        <input type="number" class="form-control" name="precio_venta" id="precio_venta" aria-describedby="helpId" >
                    </div>
                    <div class="form-group">
                        <label for="id_categoria">Categoria</label>
                        <select type="text" class="form-control" name="id_categoria" id="id_categoria" aria-describedby="helpId" >
                            @foreach ($categorias as $categoria)
                            <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id_proveedor">Proveedor</label>
                        <select type="text" class="form-control" name="id_proveedor" id="id_proveedor" aria-describedby="helpId" >
                            @foreach ($proveedors as $proveedor)
                            <option value="{{$proveedor->id}}">{{$proveedor->nombre}}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary mr-2">Registrar</button>
                    <a href="{{route('productos.index')}}" class="btn btn-light mr-2">
                        Cancelar
                    </a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

            
@endsection
@section('scripts')
{!! Html::script('melody/js/data-table.js')!!}
@endsection