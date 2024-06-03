@extends('layouts.admin')
@section('title', 'Informacion de categoria')
@section('styles')
@endsection
@section('create')

@endsection

@section('options')

@endsection
@section('preference')

@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">
        Informacion de Categoria
      </h3>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Panel de administrador</a></li>
            <li class="breadcrumb-item "><a href="#">Categoria</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$categoria->nombre}}</li>
            
        </ol>
      </nav>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="border-botton text-center pb-4">
                                <h3>{{$categoria->nombre}}</h3>
                                <div class="d-flex justify-content-between">
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-lg-8 pl-lg-5">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h4>Informacion del categoria</h4>
                                </div>
                            </div>
                            <div class="profile-feed">
                                <div class="d-flex align-item-start profile-feed-item">
                                    <div class="form-group col-md-6">
                                        <strong><i class="fab fa-product-hunt mr-1"></i>Nombre</strong>
                                        <p class="text-muted">
                                            {{$categoria->nombre}}
                                        </p>
                                        <hr>
                                        <strong><i class="far fa-id-card mr-1"></i>Descripcion</strong>
                                        <p class="text-muted">
                                            {{$categoria->descripcion}}
                                        </p>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="card-footer text-muted">
                        <a href="{{route('categorias.index')}}" type="button" class="btn btn-primary float-right">Regresar</a>
                    </div>
            </div>
        </div>
    </div>
</div>
                                

                            
@endsection