@extends('layouts.admin')
@section('title', 'Detalles de venta')
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
                Detalles de venta
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Panel de administrador</a></li>
                    <li class="breadcrumb-item "><a href="#">Ventas</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detalle de venta</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-4 text-center">
                                <label class="form-control-label">Cliente</label>
                                <p><a href="{{ route('clientes.show', $venta->cliente) }}">{{ $venta->cliente->nombre }}</a></p>
                            </div>
                            <div class="col-md-4 text-center">
                                <label class="form-control-label">Vendedor</label>
                                <p>{{$venta->usuario_id}}</p>
                            </div>
                            <div class="col-md-4 text-center">
                                <label class="form-control-label">Numero de Venta</label>
                                <p>{{ $venta->id }}</p>
                            </div>
                        </div>
                        <br /><br />
                        <div class="form-group">
                            <h4 class="card-title">Detalles de venta</h4>
                            <div class="table-responsive col-md-12">
                                <table id="detalleVentas" class="table">
                                    <thead>
                                        <tr>
                                            <th>Producto</th>
                                            <th>Precio de Venta (BOB)</th>
                                            <th>Descuento (BOB)</th>
                                            <th>Cantidad</th>
                                            <th>SubTotal (BOB)</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th colspan="4">
                                                <p align="right">TOTAL IMPUESTO ({{ $venta->tax }}%):</p>
                                            </th>
                                            <th>
                                                <p align="right">s/ {{ number_format(($subtotal * $venta->tax) / 100) }}
                                                </p>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th colspan="4">
                                                <p align="right">TOTAL:</p>
                                            </th>
                                            <th>
                                                <p align="right">s/ {{ number_format($venta->total, 2) }}</p>
                                            </th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($detalleVentas as $detalleVenta)
                                            <tr>
                                                <td>{{ $detalleVenta->producto->nombre }}</td>
                                                <td>s/ {{ $detalleVenta->precio }}</td>
                                                <td>{{ $detalleVenta->descuento }}</td>
                                                <td>{{ $detalleVenta->cantidad }}</td>
                                                <td>s/
                                                    {{ number_format($detalleVenta->cantidad * $detalleVenta->precio - ($detalleVenta->cantidad * $detalleVenta->precio * $detalleVenta->descuento) / 100, 2) }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer text-muted">
                            <a href="{{ route('ventas.index') }}" type="button"
                                class="btn btn-primary float-right">Regresar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



        @endsection
