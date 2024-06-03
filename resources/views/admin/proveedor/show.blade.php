@extends('layouts.admin')
@section('title', 'Informacion del proveedor')
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
        Informacion de Proveedores
      </h3>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Panel de administrador</a></li>
            <li class="breadcrumb-item "><a href="#">Proveedores</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$proveedor->nombre}}</li>
            
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
                                <h3>{{$proveedor->nombre}}</h3>
                                <div class="d-flex justify-content-between">
                                </div>
                            </div>
                            <div class="border-bottom py-4">
                                <div class="list-group">
                                    <button type="button" class="list-group-item list-group-item-action active"> Sobre Proveedor </button>
                                    <button type="button" class="list-group-item list-group-item-action "> Productos </button>
                                    <button type="button" class="list-group-item list-group-item-action "> Registrar </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 pl-lg-5">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h4>Informacion de proveedor</h4>
                                </div>
                            </div>
                            <div class="profile-feed">
                                <div class="d-flex align-item-start profile-feed-item">
                                    <div class="form-group col-md-6">
                                        <strong><i class="fab fa-product-hunt mr-1"></i>Nombre</strong>
                                        <p class="text-muted">
                                            {{$proveedor->nombre}}
                                        </p>
                                        <hr>
                                        <strong><i class="far fa-id-card mr-1"></i>Numero de RUC</strong>
                                        <p class="text-muted">
                                            {{$proveedor->ruc_numero}}
                                        </p>
                                        <hr>
                                        <strong><i class="fas fa-phone mr-1"></i>Telefono</strong>
                                        <p class="text-muted">
                                            {{$proveedor->telefono}}
                                        </p>
                                        <hr>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <strong><i class="fas fa-envelope mr-1"></i>Correo</strong>
                                        <p class="text-muted">
                                            {{$proveedor->email}}
                                        </p>
                                        <hr>
                                        <strong><i class="fas fa-map-marked-alt mr-1"></i>Direccion</strong>
                                        <p class="text-muted">
                                            {{$proveedor->direccion}}
                                        </p>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="card-footer text-muted">
                        <a href="{{route('proveedors.index')}}" type="button" class="btn btn-primary float-right">Regresar</a>
                    </div>
            </div>
        </div>
    </div>
</div>
                                

                            
@endsection