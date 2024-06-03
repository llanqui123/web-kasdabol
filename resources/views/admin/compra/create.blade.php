@extends('layouts.admin')
@section('title', 'Registro de compra')
@section('styles')

@section('create')
<li class="nav-item d-none d-lg-flex">
    <a href="{{route('compras.create')}}" class="nav-link"><span class="btn btn-primary">+Crear Nuevo</span></a>
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
        Registro de compra
      </h3>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Panel de administrador</a></li>
            <li class="breadcrumb-item"><a href="{{route('compras.index')}}">Compras</a></li>
            <li class="breadcrumb-item active" aria-current="page"> Registro de compra</li>
        </ol>
      </nav>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    {{--<h4 class="card-title">Compras</h4>--}}
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title"> Registro de compra</h4>
                    </div>
                    {!! Form::open(['route'=>'compras.store','method'=>'POST']) !!}
                    @include('admin.compra._form')
                </div>
                <div class="card-footer text-muted">
                    <button type="submit" id="guardar" class="btn btn-primary float-right">Registrar</button>
                    <a href="{{route('compras.index')}}" class="btn btn-light ">
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
{!! Html::script('melody/js/alerts.js')!!}
{!! Html::script('melody/js/avgrund.js')!!}
<script>
    $(document).ready(function(){
        $("#agregar").click(function(){
            agregar();
        });
    });

var cont=0;
total=0;
subtotal=[];

$("#guardar").hide();

function agregar(){
  producto_id = $("#producto_id").val();
  producto = $("#producto_id option:selected").text();
  cantidad = $("#cantidad").val();
  precio = $("#precio").val();
  impuesto = $("#tax").val();

  if(producto_id != "" && cantidad != "" && cantidad > 0 && precio != ""){
    subtotal[cont] = cantidad * precio;
    total = total + subtotal[cont];
    var fila = '<tr class="selected" id="fila' + cont + '"><td><button type="button" class="btn btn-danger btn-sm" onclick= "eliminar (' + cont + ');"> <i class="fa fa-times"></i></button></td><td><input type="hidden" name="producto_id[]" value="'+ producto_id +'">'+ producto + '</td> <td> <input type="hidden" id="precio[]" name="precio[]" value="'+ precio +'"> <input class="form-control" type="number" id="precio[]" value="'+ precio +'" disable></td> <td> <input type="hidden" name="cantidad[]" value="'+ cantidad +'"> <input class="form-control" type="number" value="'+ cantidad +'" disabled> </td> <td align="right"> s/'+ subtotal[cont] +' </td></tr>';
    cont++;
    limpiar();
    totales();
    evaluar();
    $('#detalles').append(fila);
  }else{
    Swal.fire({
      type:'error',
      text:'Rellene todos los campos del detalle de la compra',
    })
  }
}

function limpiar(){
  $("#cantidad").val("");
  $("#precio").val("");
}

function totales(){
  $("#total").html("BOB" + total.toFixed(2));
  total_impuesto = total*impuesto/100;
  total_pagar = total + total_impuesto;
  $("#total_impuesto").html("BOB" + total_impuesto.toFixed(2));
  $("#total_pagar_html").html("BOB" + total_pagar.toFixed(2));
  $("#total_pagar").val(total_pagar.toFixed(2));
}

function evaluar(){
  if(total > 0){
    $("#guardar").show();
  }else{
    $("#guardar").hide();
  }
}

function eliminar(index){
  total = total - subtotal[index];
  total_impuesto = total * impuesto/100;
  total_pagar_html = total + total_impuesto;
  $("#total").html("BOB" + total);
  $("#total_impuesto").html("BOB" + total_impuesto);
  $("#total_pagar_html").html("BOB" + total_pagar_html);
  $("#total_pagar").val(total_pagar_html.toFixed(2));
  $("#fila" + index).remove();
  console.log(total,total_impuesto,total_pagar_html);
  evaluar();
  
}
</script>
@endsection