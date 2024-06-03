@extends('layouts.admin')
@section('title', 'Gestion de categorias')
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
        Predicciones
      </h3>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Panel de administrador</a></li>
            <li class="breadcrumb-item active" aria-current="page">Predicciones</li>
        </ol>
      </nav>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div >
                        <canvas id="graficoDemanda"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div >
                        <canvas id="graficoPrediccion"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

            
@endsection
@section('scripts')
{!! Html::script('melody/js/data-table.js')!!}
{!! Html::script('melody/js/chart.js') !!}

<script>
    // Obtener los datos de demanda y predicción de Laravel
    var datosDemanda = @json($datosDemanda);
    var datosPrediccion = @json($datosPrediccion);
    
        var labels = datosDemanda.map(item => item[1]);
        var values = datosDemanda.map(item => item[0]);
        var labels1 = datosPrediccion.map(item => item[1]);
        var values1 = datosPrediccion.map(item => item[0]);

    // Configurar el contexto del gráfico de demanda
    var ctxDemanda = document.getElementById('graficoDemanda').getContext('2d');

    // Crear el gráfico de demanda
    var graficoDemanda = new Chart(ctxDemanda, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Demanda',
                data: values,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                fill: false
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Tiempo'
                    }
                },
                y: {
                    title: {
                        display: true,
                        text: 'Valor'
                    }
                }
            }
            
        }
    });

    // Configurar el contexto del gráfico de predicción
    var ctxPrediccion = document.getElementById('graficoPrediccion').getContext('2d');

    // Crear el gráfico de predicción
    var graficoPrediccion = new Chart(ctxPrediccion, {
        type: 'line',
        data: {
            labels: labels1,
            datasets: [{
                label: 'Predicción',
                data: values1,
                borderColor: 'red',
                fill: false
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Tiempo'
                    }
                },
                y: {
                    title: {
                        display: true,
                        text: 'Valor'
                    }
                }
            },
            onClick: function(event, elements) {
    if (elements.length > 0) {
        var element = elements[0];
        var index = element._index; // Cambiar de element.index a element._index
        console.log('Índice:', index);
        console.log('Valores:', values1);
        console.log('Etiquetas:', labels1);
        var value = values1[index];
        var label = labels1[index];
        // Aquí puedes realizar la operación que desees con el valor
        alert('Valor: ' + value + '\nFecha: ' + label);

        // Ejemplo de operación: calcular el doble del valor
        var resultado = value * 2;
        console.log('Resultado de la operación (doble del valor):', resultado);
    }
}
            
        }
    });
</script>
@endsection