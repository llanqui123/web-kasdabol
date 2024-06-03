<div class="form-group">
    <label for="proveedor_id">Proveedor</label>
    <select type="text" class="form-control" name="proveedor_id" id="proveedor_id" aria-describedby="helpId" >
        @foreach ($proveedors as $proveedor)
        <option value="{{$proveedor->id}}">{{$proveedor->nombre}}</option>
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
        @foreach ($productos as $producto)
        <option value="{{$producto->id}}">{{$producto->nombre}}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="cantidad">Cantidad</label>
    <input type="number" class="form-control" name="cantidad" id="cantidad" aria-describedby="helpId">
</div>
<div class="form-group">
    <label for="precio">Precio de compra</label>
    <input type="number" class="form-control" name="precio" id="precio" aria-describedby="helpId">
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
                    <th>Precio(BOB)</th>
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
                <tr id="dvOcultar">
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


