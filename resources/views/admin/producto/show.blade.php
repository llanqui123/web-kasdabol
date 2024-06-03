@extends('layouts.admin')
@section('title', 'Informacion del producto')
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
        informacion de Producto
      </h3>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Panel de administrador</a></li>
            <li class="breadcrumb-item "><a href="#">Productos</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$producto->nombre}}</li>
            
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
                                <h3>{{$producto->nombre}}</h3>
                                <div class="d-flex justify-content-between">
                                </div>
                            </div>
                            <div class="py-4">
                                <p class="clearfix">
                                    <span class="float-left">
                                        Estado
                                    </span>
                                    <span class="float-right text-muted">
                                        {{$producto->estado}}
                                    </span>
                                </p>
                                <p class="clearfix">
                                    <span class="float-left">
                                        Proveedor
                                    </span>
                                    <span class="float-right text-muted">
                                        {{$producto->id_proveedor}}
                                    </span>
                                </p>
                                <p class="clearfix">
                                    <span class="float-left">
                                        Categoria
                                    </span>
                                    <span class="float-right text-muted">
                                        {{$producto->id_categoria}}
                                    </span>
                                </p>
                                @if ($producto->estado == 'ACTIVADO')
                                <button class="btn btn-success btn-block">{{$producto->estado}}</button>
                                @else
                                <button class="btn btn-warning btn-block">{{$producto->estado}}</button>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-8 pl-lg-5">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h4>Informacion de producto</h4>
                                </div>
                            </div>
                            <div class="profile-feed">
                                <div class="d-flex align-item-start profile-feed-item">
                                    <div class="form-group col-md-6">
                                        <strong><i class="fab fa-product-hunt mr-1"></i>Codigo</strong>
                                        <p class="text-muted">
                                            {{$producto->codigo}}
                                        </p>
                                        <hr>
                                        <strong><i class="far fa-id-card mr-1"></i>Stock del producto</strong>
                                        <p class="text-muted">
                                            {{$producto->stock}}
                                        </p>
                                        <hr>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <strong><i class="fas fa-phone mr-1"></i>Precio de venta</strong>
                                        <p class="text-muted">
                                            {{$producto->precio_venta}}
                                        </p>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="card-footer text-muted">
                        <a href="{{route('productos.index')}}" type="button" class="btn btn-primary float-right">Regresar</a>
                    </div>
            </div>
        </div>
    </div>
</div>
                                

                            
@endsection