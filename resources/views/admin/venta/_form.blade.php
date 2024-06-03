<div class="form-group">
    <label for="cliente_id">Cliente</label>
    <select type="text" class="form-control" name="cliente_id" id="cliente_id" aria-describedby="helpId" >
        @foreach ($clientes as $cliente)
        <option value="{{$cliente->id}}">{{$cliente->nombre}}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
  <label for="tax">Impuesto</label>
  <input type="number" class="form-control" name="tax" id="tax" aria-describedby="helpId" placeholder="%18">
</div>

<div class="form-group">
    <label for="producto_id">Producto</label>
    <select type="text" class="form-control" name="producto_id" id="producto_id" aria-describedby="helpId" >
        <option value="" selected disabled>Seleccione un producto</option>
        @foreach ($productos as $producto)
        <option value="{{$producto->id}}_{{$producto->stock}}_{{$producto->precio_venta}}">{{$producto->nombre}}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
  <label for="stock">Stock actual</label>
  <input type="text" name="stock" id="stock" class="form-control" value="" disabled>
</div>


<div class="form-group">
    <label for="cantidad">Cantidad</label>
    <input type="number" class="form-control" name="cantidad" id="cantidad" aria-describedby="helpId">
</div>
<div class="form-group">
    <label for="precio">Precio de venta</label>
    <input type="number" class="form-control" name="precio" id="precio" aria-describedby="helpId" disabled>
</div>
<div class="form-group">
    <label for="descuento">Porcentaje de descuento</label>
    <input type="number" class="form-control" name="descuento" id="descuento" aria-describedby="helpId" value="0">
</div>

<div class="form-group">
    <button type="button" id="agregar" class="btn btn-primary float-right">Agregar producto</button>
</div>

<div class="form-group">
    <h4 class="card-title">Detalles de venta</h4>
    <div class="table-responsive coi-md-12">
        <table id="detalles" class="table table-striped">
            <thead>
                <tr>
                    <th>Eliminar</th>
                    <th>Producto</th>
                    <th>Precio de venta(BOB)</th>
                    <th>Descuento</th>
                    <th>Cantidad</th>
                    <th>Subtotal(BOB)</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th colspan="4">
                        <p align="right">TOTAL</p>
                    </th>
                    <th>
                        <p align="right"><span name="total" id="total">BOB 0.00</span></p>
                    </th>
                </tr>
                <tr >
                    <th colspan="4">
                        <p align="right">TOTAL IMPUESTO (18%):</p>
                    </th>
                    <th>
                        <p align="right"><span name="total_impuesto" id="total_impuesto">BOB 0.00</span></p>
                    </th>
                </tr>
                <tr>
                    <th colspan="4">
                        <p align="right">TOTAL PAGAR:</p>
                    </th>
                    <th>
                        <p align="right"><span align="right" name="total_pagar_html" id="total_pagar_html">BOB 0.00</span> 
                            <input type="hidden" name="total" id="total_pagar"></p>
                    </th>
                </tr>
            </tfoot>
            <tbody>
            </tbody>
        </table>
    </div>
</div>


