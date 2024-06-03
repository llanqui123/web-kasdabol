<!doctype html>
<html lang="ar" dir="rtl">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reporte de Compra!</title>
    <style>
       body{
        font-family: Arial, sans-serif;
        font-size: 14px;
      }
      #datos{
        float: left;
        margin-top: 0%;
        margin-left: 2%;
        margin-right: 2%;
      }
      #encabezado{
        text-align: center;
        margin-left: 35%;
        margin-right: 35%;
        font-size: 15px;
      }
      #fact{
        float: right;
        margin-top: 2%;
        margin-left: 2%;
        margin-right: 2%;
        font-size: 20px;
        background: #33afff;
      }
      section{
        clear: left;
        margin-top: auto;
      }
      #cliente{
        text-align: left;
      }
      #faproveedor{
        width: 40%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 15px;
      }
      #fac,
      #fv,
      #fa{
        color: #ffffff;
        font-size: 15px;
      }
      #faproveedor thead{
        padding: 20px;
        background: #33afff;
        text-align: left;
        border-bottom: 1px solid #ffffff;
      }
      #facventador{
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 15px;
      }
      #facventador thead{
        padding: 20px;
        background: #33afff;
        text-align: center;
        border-bottom: 1px solid #ffffff;
      }
      #facproducto{
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 15px;
      }
      #facproducto thead{
        padding: 20px;
        background: #33afff;
        text-align: center;
        border-bottom: 1px solid #ffffff;
      } 
    </style>
  </head>
  <body>
    <header>
      <div>
        <table id="datos">
          <thead>
            <tr>
              <th>DATOS DEL VENDEDOR</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th>
                <p id="proveedor">codigo de vendedor: {{$venta->usuario_id}} </p>
              </th>
            </tr>
          </tbody>
        </table>
      </div>
      <div id="fact">
        <p align="center">NUMERO DE VENTA <br/> {{$venta->id}}</p>
      </div>
    </header>
    <br>
    <br>
    <section>
      <div>
        <table id="faccomprador">
          <thead>
            <tr id="fv">
            </tr>
          </thead>
          <tbody>

          </tbody>
        </table>
      </div>
    </section>
    <br>
    <br>
    <section>
      <div>
        <table id="facproducto">
          <thead>
            <tr id="fa">
              <th>CANTIDAD</th>
              <th>PRODUCTO</th>
              <th>PRECIO VENTA (BOB)</th>
              <th>DESCUENTO(%)</th>
              <th>SUBTOTAL (BOB)</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($detalleVentas as $detalleVenta)
              <tr>
                <td>{{$detalleVenta->cantidad}}</td>
                <td>{{$detalleVenta->producto->nombre}}</td>
                <td>s/ {{$detalleVenta->precio}}</td>
                <td>{{$detalleVenta->descuento}}</td>
                <td>s/ {{number_format($detalleVenta->cantidad*$detalleVenta->precio-$detalleVenta->cantidad*$detalleVenta->precio*$detalleVenta->descuento/100,2)}}</td>
              </tr>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <th colspan="3">
                <p align="right">SUBTOTAL :</p>
              </th>
              <th>
                <p align="right">S/ {{number_format($subtotal,2)}}</p>
              </th>
            </tr>
            <tr>
              <th colspan="3">
                <p align="right">TOTAL IMPUESTO ({{$venta->tax}}%):</p>
              </th>
              <th>
                <p align="right">S/ {{number_format($subtotal*$venta->tax/100,2)}}</p>
              </th>
            </tr>
            <tr>
              <th colspan="3">
                <p align="right">TOTAL PAGAR:</p>
              </th>
              <th>
                <p align="right">S/ {{number_format($venta->total,2)}}</p>
              </th>
            </tr>
          </tfoot>
        </table>
      </div>
    </section>
    <br>
    <br>

  </body>
</html>