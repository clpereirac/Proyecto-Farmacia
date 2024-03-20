<?php

include('db.php');

    $id_cliente = $_POST['cliente'];
    $id_producto = $_POST['producto'];

    $fecha_venta = $_POST['fecha'];
    $cantidad = $_POST['cantidad'];
    $vendedor = $_POST['vendedor'];
    $descuento = $_POST['descuento'] / 100;
    $pago_cliente = $_POST['pago-cliente'];
    

    $sql_producto = "SELECT * FROM productos WHERE id = $id_producto";
    $result = $connect->query($sql_producto);
    $row = $result->fetch_assoc();
    $precio_producto = $row['precio'];

    if($precio_producto){

        $monto_pago = $precio_producto * $cantidad;
        $descuento_total = $monto_pago * $descuento;
        $monto_total = $monto_pago - $descuento_total;
        $cambio = $pago_cliente - $monto_total;

        if($pago_cliente < $monto_total){

            echo "No se puede realizar la venta por que el monto a pagar es menor al monto total de la venta";
        }else{

            $sql = "INSERT INTO ventas (id_venta, id_cliente, id_producto, cantidad, fecha_venta, descuento, vendedor, monto_pago, cambio, monto_total) 
            VALUES (NULL, $id_cliente, $id_producto, $cantidad, '$fecha_venta', $descuento_total, '$vendedor', $pago_cliente, $cambio, $monto_total)";
        
            if ($connect->query($sql) === TRUE) {
                echo "Registro exitoso";
            } else {
                echo "Error: " . $sql . "<br>" . $connect->error;
            }
        
            $connect->close();
        }



    }else{
        echo "Error: El producto no existe";
    }
    
?>
