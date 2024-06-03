@extends('layouts.admin')
@section('title', 'Gestion de categorias')
@section('styles')
<style>
  .overlay {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      z-index: 1000;
  }
  .alert-box {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background-color: #fff;
      border-radius: 10px;
      padding: 20px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
      max-width: 400px;
      width: 80%;
      text-align: center;
      font-family: Arial, sans-serif;
  }
  .alert-content {
      margin-bottom: 20px;
      font-size: 18px;
      color: #333;
  }
  .close-btn {
      background-color: #007bff;
      color: #fff;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
      cursor: pointer;
      font-size: 16px;
      transition: background-color 0.3s;
  }
  .close-btn:hover {
      background-color: #0056b3;
  }
</style>
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
                    <h3 class="page-title">
                        Demanda de frenos
                      </h3>
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
                  <h3 class="page-title">
                    Predicciones de Frenos
                  </h3>
                    <div >
                        <canvas id="graficoPrediccion"></canvas>
                        <div id="mantenimiento" data-mantenimiento="{{ $prediccion->mantenimiento}}"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h3 class="page-title">
                        Demanda de motor
                      </h3>
                    <div >
                        <canvas id="graficoDemanda2"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                  <h3 class="page-title">
                    Predicciones de motor
                  </h3>
                    <div >
                        <canvas id="graficoPrediccion2"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="overlay" id="overlay">
  <div class="alert-box" id="alertBox">
      <p class="alert-content" id="alertContent"></p>
      <button class="close-btn" id="closeBtn">Cerrar</button>
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
    var datosDemanda2 = @json($datosDemanda2);
    var datosPrediccion2 = @json($datosPrediccion2);
    
        var labels = datosDemanda.map(item => item[1]);
        var values = datosDemanda.map(item => item[0]);
        var labels1 = datosPrediccion.map(item => item[1]);
        var values1 = datosPrediccion.map(item => item[0]);

        var labels2 = datosDemanda2.map(item => item[1]);
        var values2 = datosDemanda2.map(item => item[0]);
        var labels12 = datosPrediccion2.map(item => item[1]);
        var values12 = datosPrediccion2.map(item => item[0]);

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
                var index = element._index;
                console.log('Índice:', index);
                console.log('Valores:', values1);
                console.log('Etiquetas:', labels1);
                var value = values1[index];
                var label = labels1[index];

                // Solicitar al usuario que ingrese un número
                var additionalData = prompt('Ingrese el costo del pedido:');

                // Verificar si el usuario ha ingresado un número
                if (additionalData !== null && !isNaN(additionalData)) {

                  // Convertir el número ingresado a un valor numérico
                  additionalData = parseFloat(additionalData);


                  var mantenimiento = parseFloat(document.getElementById('mantenimiento').getAttribute('data-mantenimiento'));
                  console.log('Valor de mantenimiento:', mantenimiento);
                  var resultado = Math.sqrt((2 * value  * additionalData ) / mantenimiento);
                  resultado = Math.round(resultado);
                  var overlay = document.getElementById('overlay');
                  var alertBox = document.getElementById('alertBox');
                  var alertContent = document.getElementById('alertContent');
                  var closeBtn = document.getElementById('closeBtn');

                  overlay.style.display = 'block';
                  alertContent.innerHTML  = 'Prediccion: ' + value + '<br>\nFecha: ' + label + '<br>\nLa cantidad óptima de compra es: ' + resultado;
                  closeBtn.addEventListener('click', function() {
                    overlay.style.display = 'none';
                  });
                  console.log('Resultado de la operación (doble del valor):', resultado);
                } else {
                  // El usuario no ingresó un número válido
                  alert('Por favor, ingrese un número válido.');
                }
              }
            }
          }
    });






    // Configurar el contexto del gráfico de demanda
    var ctxDemanda2 = document.getElementById('graficoDemanda2').getContext('2d');

    // Crear el gráfico de demanda
    var graficoDemanda2 = new Chart(ctxDemanda2, {
        type: 'line',
        data: {
            labels: labels2,
            datasets: [{
                label: 'Demanda',
                data: values2,
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
    var ctxPrediccion2 = document.getElementById('graficoPrediccion2').getContext('2d');

    // Crear el gráfico de predicción
    var graficoPrediccion2 = new Chart(ctxPrediccion2, {
        type: 'line',
        data: {
            labels: labels12,
            datasets: [{
                label: 'Predicción',
                data: values12,
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
                var index = element._index;
                console.log('Índice:', index);
                console.log('Valores:', values1);
                console.log('Etiquetas:', labels1);
                var value2 = values12[index];
                var label2 = labels12[index];

                // Solicitar al usuario que ingrese un número
                var additionalData2 = prompt('Ingrese el costo del pedido:');

                // Verificar si el usuario ha ingresado un número
                if (additionalData2 !== null && !isNaN(additionalData2)) {

                  // Convertir el número ingresado a un valor numérico
                  additionalData2 = parseFloat(additionalData2);


                  var mantenimiento2 = parseFloat(document.getElementById('mantenimiento').getAttribute('data-mantenimiento'));
                  console.log('Valor de mantenimiento:', mantenimiento);
                  var resultado2 = Math.sqrt((2 * value  * additionalData2 ) / mantenimiento);
                  resultado2 = Math.round(resultado2);
                  var overlay = document.getElementById('overlay');
                  var alertBox = document.getElementById('alertBox');
                  var alertContent = document.getElementById('alertContent');
                  var closeBtn = document.getElementById('closeBtn');

                  overlay.style.display = 'block';
                  alertContent.innerHTML  = 'Prediccion: ' + value2 + '<br>\nFecha: ' + label2 + '<br>\nLa cantidad óptima de compra es: ' + resultado2;
                  closeBtn.addEventListener('click', function() {
                    overlay.style.display = 'none';
                  });
                  console.log('Resultado de la operación (doble del valor):', resultado2);
                } else {
                  // El usuario no ingresó un número válido
                  alert('Por favor, ingrese un número válido.');
                }
              }
            }
          }
    });
</script>
@endsection