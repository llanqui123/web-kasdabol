@extends('layouts.admin')
@section('title', 'Registro de roles')
@section('styles')

@section('create')
<li class="nav-item d-none d-lg-flex">
    <a href="{{route('roles.create')}}" class="nav-link"><span class="btn btn-primary">+Crear Nuevo</span></a>
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
        Registro de roles
      </h3>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Panel de administrador</a></li>
            <li class="breadcrumb-item"><a href="{{route('roles.index')}}">Categorias</a></li>
            <li class="breadcrumb-item active" aria-current="page"> Registro de roles</li>
        </ol>
      </nav>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    {{--<h4 class="card-title">Categorias</h4>--}}
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title"> Registro de roles</h4>
                    </div>
                    {!! Form::open(['route'=>'roles.store','method'=>'POST']) !!}
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Nombre" required>
                        </div>
                      
                        <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="text" name="slug" id="slug" class="form-control" placeholder="Slug" required>
                        </div>
                      
                        <div class="form-group">
                        <label for="description">Descripcion</label>
                        <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                        </div>
                    @include('admin.role._form')
                    <button type="submit" class="btn btn-primary mr-2">Registrar</button>
                    <a href="{{route('roles.index')}}" class="btn btn-light mr-2">
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