@extends('layouts.admin')
@section('title', 'Registro de venta')
@section('styles')

@section('create')
    <li class="nav-item d-none d-lg-flex">
        <a href="{{ route('ventas.create') }}" class="nav-link"><span class="btn btn-primary">+Crear Nuevo</span></a>
    </li>
@endsection

@endsection
@section('options')

@endsection
@section('preference')

@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Registro de venta
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel de administrador</a></li>
                <li class="breadcrumb-item"><a href="{{ route('ventas.index') }}">Ventas</a></li>
                <li class="breadcrumb-item active" aria-current="page"> Registro de venta</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    {{-- <h4 class="card-title">Ventas</h4> --}}
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title"> Registro de venta</h4>
                    </div>
                    {!! Form::open(['route' => 'ventas.store', 'method' => 'POST']) !!}
                    @include('admin.venta._form')
                </div>
                <div class="card-footer text-muted">
                    <button type="submit" id="guardar" class="btn btn-primary float-right">Registrar</button>
                    <a href="{{ route('ventas.index') }}" class="btn btn-light ">
                        Cancelar
                    </a>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
{!! Html::script('melody/js/alerts.js') !!}
{!! Html::script('melody/js/avgrund.js') !!}
<script>
    $(document).ready(function() {
        $("#agregar").click(function() {
            agregar();
        });
    });

    var cont = 1;
    total = 0;
    subtotal = [];

    $("#guardar").hide();
    $("#producto_id").change(mostrarValores);

    function mostrarValores() {
        datosProducto = document.getElementById('producto_id').value.split('_');
        $("#precio").val(datosProducto[2]);
        $("#stock").val(datosProducto[1]);
    }

    function agregar() {
        datosProducto = document.getElementById('producto_id').value.split('_');

        producto_id = datosProducto[0];
        producto = $("#producto_id option:selected").text();
        cantidad = $("#cantidad").val();
        descuento = $("#descuento").val();
        precio = $("#precio").val();
        stock = $("#stock").val();
        impuesto = $("#tax").val();

        if (producto_id != "" && cantidad != "" && cantidad > 0 && precio != "") {
            if (parseInt(stock) >= parseInt(cantidad)) {
                subtotal[cont] = (cantidad * precio) - (cantidad * precio * descuento / 100);
                total = total + subtotal[cont];
                var fila = '<tr class="selected" id="fila' + cont +
                    '"><td><button type="button" class="btn btn-danger btn-sm" onclick= "eliminar (' + cont +
                    ');"><i class="fa fa-times fa-2x"></i></button></td><td><input type="hidden" name="producto_id[]" value="' +
                    producto_id + '">' + producto +
                    '</td><td> <input type="hidden" id="precio[]" name="precio[]" value="' + parseInt(precio).toFixed(
                    2) + '"> <input class="form-control" type="number" value="' + parseFloat(precio).toFixed(2) +
                    '" disabled></td> <input type="hidden" name="descuento[]" value="' + parseFloat(descuento) +
                    '"><input class="form-control" type="number" value="' + parseFloat(descuento) +
                    '" disabled> </td><td> <input type="hidden" name="cantidad[]" value="' + cantidad +
                    '"> <input class="form-control" type="number" value="' + cantidad +
                    '" disabled> </td> <td align="right"> s/' + parseFloat(subtotal[cont]).toFixed(2) + ' </td></tr> ';

                cont++;
                limpiar();
                totales();
                evaluar();
                $('#detalles').append(fila);
            } else {
                Swal.fire({
                    type: 'error',
                    text: 'La cantidad a vender supera el stock.',
                })
            }
        } else {
            Swal.fire({
                type: 'error',
                text: 'Rellene todos los campos del detalle de la compra',
            })
        }
    }

    function limpiar() {
        $("#cantidad").val("");
        $("#precio").val("");
    }

    function totales() {
        $("#total").html("BOB" + total.toFixed(2));
        total_impuesto = total * impuesto / 100;
        total_pagar = total + total_impuesto;
        $("#total_impuesto").html("BOB" + total_impuesto.toFixed(2));
        $("#total_pagar_html").html("BOB" + total_pagar.toFixed(2));
        $("#total_pagar").val(total_pagar.toFixed(2));
    }

    function evaluar() {
        if (total > 0) {
            $("#guardar").show();
        } else {
            $("#guardar").hide();
        }
    }

    function eliminar(index) {
        total = total - subtotal[index];
        total_impuesto = total * impuesto / 100;
        total_pagar_html = total + total_impuesto;
        $("#total").html("BOB" + total);
        $("#total_impuesto").html("BOB" + total_impuesto);
        $("#total_pagar_html").html("BOB" + total_pagar_html);
        $("#total_pagar").val(total_pagar_html.toFixed(2));
        $("#fila" + index).remove();
        console.log(total, total_impuesto, total_pagar_html);
        evaluar();

    }
</script>
@endsection
