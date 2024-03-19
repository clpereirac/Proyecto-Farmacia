<?php

include('db.php');


if(isset($_POST['CI'])){

    $CI = $_POST['CI'];
    $nombre = $_POST['nombre'];
    $numero_compras = $_POST['numero_compra'];


    $sql = "INSERT INTO historial_cliente (id, CI, nombre, numero_compras) VALUES (NULL, '$CI', '$nombre', $numero_compras)";

    if ($connect->query($sql) === TRUE) {
        echo "Registro exitoso";
    } else {
        echo "Error: " . $sql . "<br>" . $connect->error;
    }
}


?>