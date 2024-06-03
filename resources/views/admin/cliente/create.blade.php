@extends('layouts.admin')
@section('title', 'Registrar cliente')
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
        Registro de Clientes
      </h3>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Panel de administrador</a></li>
            <li class="breadcrumb-item"><a href="{{route('categorias.index')}}">Clientes</a></li>
            <li class="breadcrumb-item active" aria-current="page"> Registro de Clientes</li>
        </ol>
      </nav>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    {{--<h4 class="card-title">Clientes</h4>--}}
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title"> Registro de Clientes</h4>
                    </div>
                    {!! Form::open(['route'=>'clientes.store','method'=>'POST']) !!}

                    <div class="form-group">
                      <label for="nombre">Nombre</label>
                      <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="helpId" >
                    </div>
                    <div class="form-group">
                        <label for="ci">Documento de identidad</label>
                        <input type="number" class="form-control" name="ci" id="ci" aria-describedby="helpId" >
                    </div>
                    <div class="form-group">
                        <label for="ruc">Numero de RUC</label>
                        <input type="number" class="form-control" name="ruc" id="ruc" aria-describedby="helpId" >
                    </div>
                    <div class="form-group">
                        <label for="direccion">Direccion</label>
                        <input type="text" class="form-control" name="direccion" id="direccion" aria-describedby="helpId" >
                    </div>
                    <div class="form-group">
                        <label for="telefono">Numero de telefono</label>
                        <input type="number" class="form-control" name="telefono" id="telefono" aria-describedby="helpId" >
                    </div>
                    <div class="form-group">
                        <label for="email">Correo electronico</label>
                        <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelpId" placeholder="ejemplo@gmail.com" required>
                      </div>
                    <button type="submit" class="btn btn-primary mr-2">Registrar</button>
                    <a href="{{route('clientes.index')}}" class="btn btn-light mr-2">
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