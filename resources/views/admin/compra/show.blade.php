@extends('layouts.admin')
@section('title', 'Detalles de compra')
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
        Detalles de compra
      </h3>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Panel de administrador</a></li>
            <li class="breadcrumb-item "><a href="#">Compras</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detalle de compra</li>
            
        </ol>
      </nav>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group row">
                      <div class="col-md-4 text-center">
                        <label class="form-control-label" for="nombre">Proveedor</label>
                        <p>{{$compra->proveedor->nombre}}</p>
                      </div>
                      <div class="col-md-4 text-center">
                        <label class="form-control-label" for="num_compra">Numero de compra</label>
                        <p>{{$compra->id}}</p>
                      </div>
                    </div>
                    <br/><br/>
                    <div class="form-group row">
                      <h4 class="card-title ml-3">Detalle de Compras</h4>
                      <div class="table-responsive col-md-12">
                        <table id="detalles" class="table">
                          <thead>
                            <tr>
                              <th>Producto</th>
                              <th>Precio (BOB)</th>
                              <th>Cantidad</th>
                              <th>SubTotal (BOB)</th>
                            </tr>
                          </thead>
                          <tfoot>
                            <tr>
                              <th colspan="3">
                                <p align="right">SUBTOTAL:</p>
                              </th>
                              <th colspan="3">
                                <p align="right">s/{{number_format($subtotal,2)}}</p>
                              </th>
                            </tr>
                            <tr>
                              <th colspan="3">
                                <p align="right">TOTAL IMPUESTO {{$compra->tax}}%:</p>
                              </th>
                              <th colspan="3">
                                <p align="right">s/{{number_format($subtotal*$compra->tax/100,2)}}</p>
                              </th>
                            </tr>
                            <tr>
                              <th colspan="3">
                                <p align="right">TOTAL:</p>
                              </th>
                              <th colspan="3">
                                <p align="right">s/{{number_format($compra->total,2)}}</p>
                              </th>
                            </tr>
                          </tfoot>
                          <tbody>
                            @foreach ($detalleCompras as $detalleCompra )
                              <tr>
                                <td>{{$detalleCompra->producto->nombre}}</td>
                                <td>s/{{$detalleCompra->precio}}</td>
                                <td>{{$detalleCompra->cantidad}}</td>
                                <td>{{number_format($detalleCompra->cantidad*$detalleCompra->precio,2)}}</td>
                              </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                </div>
            </div>
                    <div class="card-footer text-muted">
                        <a href="{{route('compras.index')}}" type="button" class="btn btn-primary float-right">Regresar</a>
                    </div>
            </div>
        </div>
    </div>
</div>
                                

                            
@endsection