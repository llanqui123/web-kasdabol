@extends('layouts.admin')
@section('title', 'Gestion de productos')
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
    <a href="{{route('productos.create')}}" class="nav-link"><span class="btn btn-primary">+Crear Nuevo</span></a>
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
        Productos
      </h3>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Panel de administrador</a></li>
            <li class="breadcrumb-item active" aria-current="page">Productos</li>
        </ol>
      </nav>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    {{--<h4 class="card-title">Categorias</h4>--}}
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Productos</h4>
                        {{--<i class="fas fa-ellipsis-v"></i>--}}
                        <div class="btn-group">
                            <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                              <a href="{{route('productos.create')}}" class="nav-link">Crear Nuevo</a>
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
                                    <th>Nombre</th>
                                    <th>Stock</th>
                                    <th>Estado</th>
                                    <th>Categoria</th>
                                    <th>Acciones</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($productos as $producto )
                                <tr>
                                    <th scope="row">{{$producto->id}}</th>
                                    <td>
                                        <a href="{{route('productos.show',$producto)}}">{{$producto->nombre}}</a>
                                    </td>
                                    <td>{{$producto->stock}}</td>

                                    @if ($producto->estado == 'ACTIVADO')
                                    <td>
                                        <a class="jsgrid-button btn btn-success" href="{{route('cambiar.estado.productos',$producto)}}" title="Editar">
                                            {{$producto->estado}}<i class="fas fa-check"></i>
                                        </a>
                                    </td>
                                    @else
                                    <td>
                                        <a class="jsgrid-button btn btn-danger" href="{{route('cambiar.estado.productos',$producto)}}" title="Editar">
                                            {{$producto->estado}}<i class="fas fa-times"></i>
                                        </a>
                                    </td>
                                    @endif

                                    <td>{{$producto->id_categoria}}</td>
                                    <td style="width: 50px">
                                        {!! Form::open(['route'=>['productos.destroy',$producto],'method'=>'DELETE'])!!}

                                        <a class="jsgrid-button jsgrid-edit-button" href="{{route('productos.edit',$producto)}}" title="Editar">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        <button class="jsgrid-button jsgrid-delete-button unstyled-button" type="submit" title="Eliminar">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                        {!! Form::close()!!}
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