@extends('layouts.admin')
@section('title', 'Registrar categorias')
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
        Registrar de categorias
      </h3>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Panel de administrador</a></li>
            <li class="breadcrumb-item"><a href="{{route('categorias.index')}}">Categorias</a></li>
            <li class="breadcrumb-item active" aria-current="page"> Registrar de categorias</li>
        </ol>
      </nav>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    {{--<h4 class="card-title">Categorias</h4>--}}
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title"> Registrar de categorias</h4>
                    </div>
                    {!! Form::open(['route'=>'categorias.store','method'=>'POST']) !!}
                    @include('admin.categoria._form')

                    <button type="submit" class="btn btn-primary mr-2">Registrar</button>
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