@extends('layouts.admin')
@section('title', 'Reporte por rango de fechas')
@section('styles')
    <style type="text/css">
        .unstyled-button {
            border: none;
            padding: 0;
            background: none;
        }
    </style>
@endsection

@section('create')
    <li class="nav-item d-none d-lg-flex">
        <a href="{{ route('ventas.create') }}" class="nav-link"><span class="btn btn-primary">+Crear Nuevo</span></a>
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
                Reporte por rango de fechas
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Panel de administrador</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Reporte por rango de fechas</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        {{-- <h4 class="card-title">Categorias</h4> --}}
                        <div class="d-flex justify-content-between">
                            {{-- <h4 class="card-title">Reporte ventas</h4>
                            <div class="btn-group">
                                <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>
                            </div> --}}
                        </div>
                        {!! Form::open(['route'=>'reporte.resultados','method'=>'POST']) !!}
                        <div class="row">
                            <div class="col-12 col-md-4 text-center">
                                <span>Fecha inicial: <b></b></span>
                                <div class="form-group">
                                    <input type="date" class="form-control" value="{{old('fecha_ini')}}" name="fecha_ini" id="fecha_ini">
                                </div>
                            </div>
                            <div class="col-12 col-md-4 text-center">
                                <span>Fecha final: <b></b></span>
                                <div class="form-group">
                                    <input type="date" class="form-control" value="{{old('fecha_fin')}}" name="fecha_fin" id="fecha_fin">
                                </div>
                            </div>
                            <div class="col-12 col-md-2 text-center mt-4">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-sm">Consultar</button>
                                </div>
                            </div>
                            <div class="col-12 col-md-2 text-center">
                                <span>Total de ingresos: <b></b></span>
                                <div class="form-group">
                                    <strong>s/ {{$total}}</strong>
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}

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
                                    @foreach ($ventas as $venta)
                                        <tr>
                                            <th scope="row">
                                                <a href="{{ route('ventas.show', $venta) }}">{{ $venta->id }}</a>
                                            </th>
                                            <td>{{ $venta->fecha_venta }}</td>
                                            <td>{{ $venta->total }}</td>
                                            <td>{{ $venta->estado }}</td>
                                            <td style="width: 50px">

                                                {{-- <a class="jsgrid-button jsgrid-edit-button" href="{{route('ventas.edit',$venta)}}" title="Editar">
                                            <i class="far fa-edit"></i>
                                        </a> --}}

                                                <a href="{{ route('ventas.pdf', $venta) }}"><i
                                                        class='fa fa-file-pdf'></i></a>
                                                {{-- <a href="{{ route('ventas.print', $venta) }}"><i class='fa fa-print'></i></a> --}}
                                                <a href="{{ route('ventas.show', $venta) }}"><i class='fa fa-eye'></i></a>

                                                {{-- <button class="jsgrid-button jsgrid-delete-button unstyled-button" type="submit" title="Eliminar">
                                            <i class="far fa-trash-alt"></i>
                                        </button> --}}

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
    {!! Html::script('melody/js/data-table.js') !!}
    <script>
        window.onload = function(){
            var fecha = new Date();
            var mes = fecha.getMonth()+1;
            var dia = fecha.getDate();
            var ano = fecha.getFullYear();

            if(dia<10)
                dia='0'+dia
            if(mes<10)
                mes='0'+mes
            document.getElementById('fecha_fin').value=ano+"-"+mes+"-"+dia;
        }
    </script>
@endsection
