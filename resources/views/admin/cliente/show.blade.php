@extends('layouts.admin')
@section('title', 'Informacion del cliente')
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
        Informacion de Cliente
      </h3>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Panel de administrador</a></li>
            <li class="breadcrumb-item "><a href="#">Clientes</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$cliente->nombre}}</li>
            
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
                                <h3>{{$cliente->nombre}}</h3>
                                <div class="d-flex justify-content-between">
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-lg-8 pl-lg-5">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h4>Informacion del cliente</h4>
                                </div>
                            </div>
                            <div class="profile-feed">
                                <div class="d-flex align-item-start profile-feed-item">
                                    <div class="form-group col-md-6">
                                        <strong><i class="fab fa-product-hunt mr-1"></i>Nombre</strong>
                                        <p class="text-muted">
                                            {{$cliente->nombre}}
                                        </p>
                                        <hr>
                                        <strong><i class="far fa-id-card mr-1"></i>Documento de identidad</strong>
                                        <p class="text-muted">
                                            {{$cliente->ci}}
                                        </p>
                                        <hr>
                                        <strong><i class="far fa-id-card mr-1"></i>Numero de RUC</strong>
                                        <p class="text-muted">
                                            {{$cliente->ruc}}
                                        </p>
                                        <hr>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <strong><i class="fas fa-phone mr-1"></i>Direccion</strong>
                                        <p class="text-muted">
                                            {{$cliente->direccion}}
                                        </p>
                                        <hr>
                                        <strong><i class="fas fa-phone mr-1"></i>Telefono</strong>
                                        <p class="text-muted">
                                            {{$cliente->telefono}}
                                        </p>
                                        <hr>
                                        <strong><i class="fas fa-phone mr-1"></i>Correo electronico</strong>
                                        <p class="text-muted">
                                            {{$cliente->email}}
                                        </p>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="card-footer text-muted">
                        <a href="{{route('clientes.index')}}" type="button" class="btn btn-primary float-right">Regresar</a>
                    </div>
            </div>
        </div>
    </div>
</div>
                                

                            
@endsection