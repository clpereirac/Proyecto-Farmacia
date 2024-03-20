<?php

include('db.php');


$sql_cliente = "SELECT * FROM historial_cliente";
$resultado_cliente = $connect->query($sql_cliente);

$sql_producto = "SELECT * FROM productos";
$resultado_producto = $connect->query($sql_producto);

$fecha_actual = date('Y-m-d');

?>


<div class="container-venta">
    <h2>Completar los datos de la venta</h2>

    <form action="javascript:procesarVenta()" method="post" id="form-venta">
        <div>
            <label for="cliente">Cliente</label>
            <select name="cliente" id="cliente">
                <option value="">Seleccionar cliente</option>
                <?php while ($row = $resultado_cliente->fetch_assoc()) { ?>
                        <option value="<?php echo $row['id'] ?>"><?php echo $row['nombre'] ?></option>
                    <?php } ?>
            </select>
        </div>
        <div>
            <label for="fecha">Fecha de venta: </label>
            <input type="date" name="fecha" id="fecha" value="<?php echo $fecha_actual; ?>" readonly>
        </div>
        <div>
            <label for="producto">Producto: </label>
            <select name="producto" id="producto">
                <option value="">Seleccionar producto</option>
                <?php while ($row_prod = $resultado_producto->fetch_assoc()) { ?>
                        <option value="<?php echo $row_prod['id'] ?>"><?php echo $row_prod['nombre'] ?></option>
                    <?php } ?>
            </select>
        </div>
        <div>
            <label for="cantidad">Cantidad: </label>
            <input type="number" name="cantidad" id="cantidad">
        </div>
        <div>
            <label for="vendedor">Vendedor: </label>
            <input type="text" name="vendedor" id="vendedor">
        </div>
        <div>
            <label for="descuente">Descuento: </label>
            <input type="number" name="descuento" id="descuento">%
        </div>
        <div>
            <label for="pago-cliente">Pago de cliente: </label>
            <input type="number" name="pago-cliente" id="pago-cliete">Bs.
        </div>

        <input type="submit" value="Procesar venta">
    </form>
</div>