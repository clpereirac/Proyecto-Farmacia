
<?php

include('db.php');

$sql_ventas = "SELECT * FROM ventas";

if(isset($_GET['buscar'])){
    $buscar = $_GET['buscar'];
    
    $sql_ventas .= " WHERE id_cliente = $buscar";
}

$result_venta = $connect->query($sql_ventas);


?>

<div class="buscar-venta">
        <label for="buscar">Buscar historial de venta</label>
        <br>
        <input type="number" name="nombre_producto" id="id_factura" placeholder="Buscar producto">
        <button onclick="javascript:buscarFactura()">Buscar</button>
</div>

<?php

while($row_venta = $result_venta->fetch_assoc()){ 

    $id_cliente = $row_venta['id_cliente'];
    $id_producto = $row_venta['id_producto'];

    $sql_cliente = "SELECT * FROM historial_cliente WHERE id = $id_cliente";
    $result_cliente = $connect->query($sql_cliente);
    $row_cliente = $result_cliente->fetch_assoc();

    $sql_producto = "SELECT * FROM productos WHERE id = $id_producto";
    $result_producto = $connect->query($sql_producto);
    $row_producto = $result_producto->fetch_assoc();

    $porcentaje = ($row_venta['descuento'] / ($row_producto['precio'] * $row_venta['cantidad'])) * 100; 
    
    ?>

    <div class="container-factura">
        <div class="titulo">
            <img src="./img/lab_default.png" alt="">
            <h2>FACTURA DE VENTA</h2>
        </div>

        <div class="main">

            <div class="detalles-venta">
                <div class="detalles-cliente">
                    <h3>Información del cliente</h3>
                    <p><strong>ID Cliente: </strong> <?php echo $row_cliente['id'] ?></p>
                    <p><strong>Nombre: </strong> <?php echo $row_cliente['nombre'] ?></p>
                    <p><strong>C.I.</strong>  <?php echo $row_cliente['CI'] ?></p>
                    <p><strong>Nro de compras: </strong>  <?php echo $row_cliente['numero_compras'] ?></p>
                </div>
                <div class="detalles-factura">
                    <h3>Detalles de la factura</h3>
                    <p><strong>Número de factura: </strong>  <?php echo $row_venta['id_venta'] ?></p>
                    <p><strong>Fecha de venta: </strong>  <?php echo $row_venta['fecha_venta'] ?></p>
                </div>
            </div>


            <div class="datos-producto">
                <h2>Productos</h2>
                <table>
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Total</th>
                    </tr>
                    <tr>
                        <td><?php echo $row_producto['nombre'] ?></td>
                        <td><?php echo $row_venta['cantidad'] ?></td>
                        <td><?php echo $row_producto['descripcion'] ?></td>
                        <td><?php echo $row_producto['precio'] ?> $</td>
                        <td><?php echo $row_producto['precio'] * $row_venta['cantidad'] ?> $</td>
                    </tr>
                </table>
            </div>

            <div class="pagos">
                <h2>Total</h2>
                <p><strong>Pago inicial del cliente: </strong>  <?php echo $row_venta['monto_pago'] ?>$</p>
                <p><strong>Subtotal: </strong> <?php echo $row_producto['precio'] * $row_venta['cantidad'] ?> $</p>
                <p><strong>Descuento de: </strong> <?php echo intval($porcentaje) ?>%: <?php echo $row_venta['descuento'] ?>$</p>
                <p><strong>Cambio: </strong>  <?php echo $row_venta['cambio'] ?>$</p>
                <p><strong>Total Pagar: </strong>  <?php echo $row_venta['monto_total'] ?>$</p>
                <p><strong>Vendedor: </strong> <?php echo $row_venta['vendedor'] ?></p>
            </div>

            <p><strong>Contactanos:</strong> +591 74323422           <strong>Correo: </strong> farmaciaAgustin.@gmail.com</p>
        </div>
    </div>

<?php } ?>