@extends('layouts.admin')
@section('title', 'Gestion de compras')
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
    <a href="{{route('compras.create')}}" class="nav-link"><span class="btn btn-primary">+Crear Nuevo</span></a>
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
        Compras
      </h3>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Panel de administrador</a></li>
            <li class="breadcrumb-item active" aria-current="page">Compras</li>
        </ol>
      </nav>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    {{--<h4 class="card-title">Categorias</h4>--}}
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Compras</h4>
                        {{--<i class="fas fa-ellipsis-v"></i>--}}
                        <div class="btn-group">
                            <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                              <a href="{{route('compras.create')}}" class="nav-link">Registrar</a>
                              {{--<button class="dropdown-item" type="button">Another action</button>
                              <button class="dropdown-item" type="button">Something else here</button>--}}
                            </div>
                          </div>
                    </div>
                    <div class="table-responsive">
                        <table id="order-listing" class="table">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Fecha</th>
                                    <th>Total</th>
                                    <th>Estado</th>
                                    <th style="width:50px">Acciones</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($compras as $compra )
                                <tr>
                                    <th scope="row">
                                        <a href="{{route('compras.show',$compra)}}">{{$compra->id}}</a>
                                    </th>
                                    <td>{{$compra->fecha_compra}}</td>
                                    <td>{{$compra->total}}</td>
                                    @if ($compra->estado == 'VALIDO')
                                    <td>
                                        <a class="jsgrid-button btn btn-success" href="{{route('cambiar.estado.compras',$compra)}}" title="Editar">
                                            {{$compra->estado}}<i class="fas fa-check"></i>
                                        </a>
                                    </td>
                                    @else
                                    <td>
                                        <a class="jsgrid-button btn btn-danger" href="{{route('cambiar.estado.compras',$compra)}}" title="Editar">
                                            {{$compra->estado}}<i class="fas fa-times"></i>
                                        </a>
                                    </td>
                                    @endif
                                    <td style="width: 50px">

                                        {{--<a class="jsgrid-button jsgrid-edit-button" href="{{route('compras.edit',$compra)}}" title="Editar">
                                            <i class="far fa-edit"></i>
                                        </a>--}}

                                        <a href="{{route('compras.pdf',$compra)}}"><i class='fa fa-file-pdf'></i></a>
                                        <a href="#"><i class='fa fa-print'></i></a>
                                        <a href="{{route('compras.show',$compra)}}"><i class='fa fa-eye'></i></a>

                                        {{--<button class="jsgrid-button jsgrid-delete-button unstyled-button" type="submit" title="Eliminar">
                                            <i class="far fa-trash-alt"></i>
                                        </button>--}}

                                </tr>
                                    
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

            
@endsection
@section('scripts')
{!! Html::script('melody/js/data-table.js')!!}
@endsection