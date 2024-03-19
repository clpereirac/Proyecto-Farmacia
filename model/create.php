<?php

    include('db.php');

    $sql_prod = "SELECT MAX(id) AS Maximo_ID FROM productos";
    $result_prod = $connect->query($sql_prod);

    $row = $result_prod->fetch_assoc();
    $id = $row['Maximo_ID'] + 1;

    if($id){
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $stock = $_POST['stock'];
        $fecha_de_vencimiento = $_POST['fecha_de_vencimiento'];
        $lote = $_POST['lote'];

        $archivo_original = (isset($_FILES['fotografia']['name'])) ? $_FILES['fotografia']['name'] : '';
        $arreglo_img = explode(".", $archivo_original);
        $extension = $arreglo_img[1];
        $fotografia = uniqid() . '.' . $extension;

        copy($_FILES['fotografia']['tmp_name'], '../img/' . $fotografia);

        $sql = "INSERT INTO productos (id, fotografia, nombre, descripcion, precio, stock, lote) 
        VALUES (NULL, '$fotografia', '$nombre', '$descripcion', $precio, $stock, '$lote')";

        $sql_lotes = "INSERT INTO lotes_vencidos (id_lote, id_producto, fecha_vencimiento) VALUES (NULL, $id, '$fecha_de_vencimiento')";

        if ($connect->query($sql) === TRUE && $connect->query($sql_lotes) === TRUE) {
            echo "Producto registrado";
        } else {
            echo "Error: " . $sql . "<br>" . $connect->error;
        }

        $connect->close();
    }
?>
