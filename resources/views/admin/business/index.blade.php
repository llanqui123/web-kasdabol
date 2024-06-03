@extends('layouts.admin')
@section('title', 'Gestion de empresa')
@section('styles')
<style type="text/css">
    .unstyled-button{
        border: none;
        padding: 0;
        background: none;
    }
</style>
@endsection

@section('create')
<li class="nav-item d-none d-lg-flex">
    <a href="{{route('clientes.create')}}" class="nav-link"><span class="btn btn-primary">+Crear Nuevo</span></a>
</li>
@endsection

@section('options')

@endsection
@section('preference')

@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">
        Gestion de empresa
      </h3>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Panel de administrador</a></li>
            <li class="breadcrumb-item active" aria-current="page">Gestion de empresa</li>
        </ol>
      </nav>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    {{--<h4 class="card-title">Categorias</h4>--}}
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Gestion De Empresa</h4>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <strong><i class="fab fa-product-hunt mr-1"></i>Nombre</strong>
                            <p class="text-muted">
                                {{$business->nombre}}
                            </p>
                            <hr>
                            <strong><i class="far fa-id-card mr-1"></i>Descripción</strong>
                            <p class="text-muted">
                                {{$business->descripcion}}
                            </p>
                            <hr>
                            <strong><i class="fab fa-product-hunt mr-1"></i>Dirección</strong>
                            <p class="text-muted">
                                {{$business->nombre}}
                            </p>
                            <hr>
                            <strong><i class="fab fa-product-hunt mr-1"></i>RUC</strong>
                            <p class="text-muted">
                                {{$business->ruc}}
                            </p>
                            <hr>
                        </div>
                        <div class="form-group col-md-6">
                            <strong><i class="far fa-id-card mr-1"></i>Correo electronico</strong>
                            <p class="text-muted">
                                {{$business->mail}}
                            </p>
                            <hr>
                            <strong><i class="fab fa-product-hunt mr-1"></i>Costo de pedidos</strong>
                            <p class="text-muted">
                                {{$business->costo_pedido}}
                            </p>
                            <hr>
                            <strong><i class="fab fa-product-hunt mr-1"></i>Mantenimiento</strong>
                            <p class="text-muted">
                                {{$business->mantenimiento}}
                            </p>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <strong><i class="fab fa-product-hunt mr-1"></i>Logo</strong><br>
                                </div>
                                <div class="col-md-6">
                                    <img src="{{asset('image/'.$business->logo)}}" alt="logo" class="rounded float-left" style="width:50px; height:50px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#exampleModal-2">Actualizar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal-2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel-2">Actualizar datos de empresa</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>


        {!! Form::model($business,['route'=>['business.update',$business],'method'=>'PUT']) !!}
        <div class="modal-body">
          <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text"
              class="form-control" name="nombre" id="nombre" aria-describedby="helpId" value="{{$business->nombre}}">
          </div>
          <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea class="form-control" name="descripcion" id="descripcion" rows="3" >{{$business->descripcion}}</textarea>
          </div>
          <div class="form-group">
            <label for="mail">Correo electronico</label>
            <input type="email"
              class="form-control" name="mail" id="mail" aria-describedby="helpId" value="{{$business->mail}}">
          </div>
          <div class="form-group">
            <label for="direccion">Dirección</label>
            <input type="text"
              class="form-control" name="direccion" id="direccion" aria-describedby="helpId" value="{{$business->costo}}">
          </div>
          <div class="form-group">
            <label for="ruc">Numero de RUC</label>
            <input type="number"
              class="form-control" name="ruc" id="ruc" aria-describedby="helpId" value="{{$business->ruc}}">
          </div>
          <div class="card-body">
            <h5 class="card-title d-flex">Logo
                <small class="ml-auto align-self-end">
                    <a href="dropify.html" class="font-weight-light" target="_blanck">Seleccionar archivo</a>
                </small>
            </h4>
            <input type="file" name="picture" id="picture" class="dropify">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Actualizar</button>
          <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
        </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
            
@endsection
@section('scripts')
{!! Html::script('melody/js/data-table.js')!!}
{!! Html::script('melody/js/dropify.js')!!}
@endsection