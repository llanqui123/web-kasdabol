@extends('layouts.admin')
@section('title', 'Editar categorias')
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
        Editar categorias
      </h3>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Panel de administrador</a></li>
            <li class="breadcrumb-item"><a href="{{route('categorias.index')}}">Categorias</a></li>
            <li class="breadcrumb-item active" aria-current="page"> Editar categorias</li>
        </ol>
      </nav>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    {{--<h4 class="card-title">Categorias</h4>--}}
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title"> Editar categorias</h4>
                    </div>
                    {!! Form::model($categoria,['route'=>['categorias.update',$categoria],'method'=>'PUT']) !!}
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" value="{{$categoria->nombre}}" placeholder="Nombre" required>
                      </div>
                      <div class="form-group">
                        <label for="descripcion">Descripcion</label>
                        <textarea class="form-control" name="descripcion" id="descripcion" rows="3">{{$categoria->descripcion}}</textarea>
                      </div>

                    <button type="submit" class="btn btn-primary mr-2">Actualizar</button>
                    <a href="{{route('categorias.index')}}" class="btn btn-light mr-2">
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