<?php

    include('db.php');

    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    $fecha_de_vencimiento = $_POST['fecha_de_vencimiento'];
    $lote = $_POST['lote'];

    // echo $nombre . $descripcion . $precio . $stock . $fecha_de_vencimiento . $lote;

    $archivo_original = (isset($_FILES['fotografia']['name'])) ? $_FILES['fotografia']['name'] : '';
    $arreglo_img = explode(".", $archivo_original);
    $extension = $arreglo_img[1];
    $fotografia = uniqid() . '.' . $extension;

    copy($_FILES['fotografia']['tmp_name'], '../img/' . $fotografia);

    $sql = "INSERT INTO productos (id, fotografia, nombre, descripcion, precio, stock, fecha_de_vencimiento, lote) 
    VALUES (NULL, '$fotografia', '$nombre', '$descripcion', $precio, $stock, '$fecha_de_vencimiento', '$lote')";

    if ($connect->query($sql) === TRUE) {
        echo "Producto registrado";
    } else {
        echo "Error: " . $sql . "<br>" . $connect->error;
    }

    $connect->close();
?>
