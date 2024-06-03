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
      #faccomprador{
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 15px;
      }
      #faccomprador thead{
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
              <th>DATOS DEL PROVEEDOR</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th>
                <p id="proveedor">Nombre: {{$compra->proveedor->nombre}} <br> Direccion: {{$compra->proveedor->direccion}}<br> Telefono: {{$compra->proveedor->telefono}} <br> Email: {{$compra->proveedor->email}}</p>
              </th>
            </tr>
          </tbody>
        </table>
      </div>
      <div id="fact">
        <p>NUMERO DE COMPRA <br/> {{$compra->id}}</p>
      </div>
    </header>
    <br>
    <br>
    <section>
      <div>
        <table id="faccomprador">
          <thead>
            <tr id="fv">
              <th>COMPRADOR</th>
              <th>FECHA COMPRA</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              
              <td>{{$compra->usuario_id}}</td>
              <td>{{$compra->created_at}}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </section>
    <br>
    <section>
      <div>
        <table id="facproducto">
          <thead>
            <tr id="fa">
              <th>CANTIDAD</th>
              <th>PRODUCTO</th>
              <th>PRECIO COMPRA (BOB)</th>
              <th>SUBTOTAL (BOB)</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($detalleCompras as $detalleCompra)
              <tr>
                <td>{{$detalleCompra->cantidad}}</td>
                <td>{{$detalleCompra->producto->nombre}}</td>
                <td>s/ {{$detalleCompra->precio}}</td>
                <td>s/ {{number_format($detalleCompra->cantidad*$detalleCompra->precio,2)}}</td>
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
                <p align="right">TOTAL IMPUESTO ({{$compra->tax}}%):</p>
              </th>
              <th>
                <p align="right">S/ {{number_format($subtotal*$compra->tax/100,2)}}</p>
              </th>
            </tr>
            <tr>
              <th colspan="3">
                <p align="right">TOTAL PAGAR:</p>
              </th>
              <th>
                <p align="right">S/ {{number_format($compra->total,2)}}</p>
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