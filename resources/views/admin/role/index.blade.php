@extends('layouts.admin')
@section('title', 'Gestion de roles del sistema')
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
    <a href="{{route('roles.create')}}" class="nav-link"><span class="btn btn-primary">+Crear Nuevo</span></a>
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
        Roles
      </h3>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Panel de administrador</a></li>
            <li class="breadcrumb-item active" aria-current="page">Roles</li>
        </ol>
      </nav>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    {{--<h4 class="card-title">Roles</h4>--}}
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Roles</h4>
                        {{--<i class="fas fa-ellipsis-v"></i>--}}
                        <div class="btn-group">
                            <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                              <a href="{{route('roles.create')}}" class="nav-link">Crear Nuevo</a>
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
                                    <th>Descripcion</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role )
                                <tr>
                                    <th scope="row">{{$role->id}}</th>
                                    <td>
                                        <a href="{{route('roles.show',$role)}}">{{$role->name}}</a>
                                    </td>
                                    <td>{{$role->description}}</td>
                                    <td style="width: 50px">
                                        {!! Form::open(['route'=>['roles.destroy',$role],'method'=>'DELETE'])!!}

                                        <a class="jsgrid-button jsgrid-edit-button" href="{{route('roles.edit',$role)}}" title="Editar">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        <button class="jsgrid-button jsgrid-delete-button unstyled-button" type="submit" title="Eliminar">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                        {!! Form::close()!!}
                                </tr>
                                    
                                @endforeach

                                {{--@foreach ($roles as $role )
                                <tr>
                                    <th scope="row">{{$role-id}}</th>
                                    <td>{{$role->name}}</td>
                                    <td>{{$role->name}}</td>
                                    <td>{{$role->name}}</td>
                                    <td style="width: 50px">
                                        {!! Form::open(['route'=>['roles.destroy',$role],'method'=>'DELETE'])!!}

                                        <a class="jsgrid-button jsgrid-edit-button" href="{{route('roles.edit',$role)}}" title="Editar">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        <a class="jsgrid-button jsgrid-delete-button" type="submit" title="Eliminar">
                                            <i class="far fa-trash-alt"></i>
                                        </a>
                                        {!! Form::close()!!}
                                </tr>
                                    
                                @endforeach--}}
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