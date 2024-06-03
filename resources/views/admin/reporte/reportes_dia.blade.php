@extends('layouts.admin')
@section('title', 'Reporte ventas')
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
                Reporte ventas
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Panel de administrador</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Reporte ventas</li>
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

                        <div class="row">
                            <div class="col-12 col-md-4 text-center">
                                <span>Fecha de consulta: <b></b></span>
                                <div class="form-group">
                                    <strong>{{\Carbon\Carbon::now()->format('d/m/Y')}}</strong>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 text-center">
                                <span>Cantidad de registros: <b></b></span>
                                <div class="form-group">
                                    <strong>{{$ventas->count()}}</strong>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 text-center">
                                <span>Total de ingresos: <b></b></span>
                                <div class="form-group">
                                    <strong>{{$total}}</strong>
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
@endsection
