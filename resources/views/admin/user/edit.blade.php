@extends('layouts.admin')
@section('title', 'Editar usuario')
@section('styles')

@endsection
@section('options')

@endsection
@section('preference')

@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">
        Editar usuario
      </h3>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Panel de administrador</a></li>
            <li class="breadcrumb-item"><a href="{{route('users.index')}}">Categorias</a></li>
            <li class="breadcrumb-item active" aria-current="page"> Editar usuario</li>
        </ol>
      </nav>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    {{--<h4 class="card-title">Categorias</h4>--}}
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title"> Editar users</h4>
                    </div>
                    {!! Form::model($user,['route'=>['users.update',$user],'method'=>'PUT']) !!}

                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{$user->name}}" placeholder="Nombre" required>
                      </div>
                      <div class="form-group">
                        <label for="email">Correo electronico</label>
                        <input type="email" class="form-control" name="email" id="email" value="{{$user->email}}" placeholder="Ejemplo@gmail.com"></input>
                      </div>




                     {{--  <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" class="form-control" name="password" id="password"></input>
                      </div> --}}

                      @include('admin.user._form')


                    <button type="submit" class="btn btn-primary mr-2">Actualizar</button>
                    <a href="{{route('users.index')}}" class="btn btn-light mr-2">
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