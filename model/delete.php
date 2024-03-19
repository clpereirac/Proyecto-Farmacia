<?php

    include('db.php');

    if(isset($_GET['id'])){

        $id = $_GET['id'];

        $sql = "DELETE FROM productos WHERE id = $id";

        $sql_lotes = "DELETE FROM lotes_vencidos WHERE id_producto = $id";

        if ($connect->query($sql) === TRUE && $connect->query($sql_lotes) === TRUE) {
            echo "Registro eliminado";
        } else {
            echo "Error: " . $sql . "<br>" . $connect->error;
        }

        $connect->close();
    }

?>