<?php

    include('db.php');

    if(isset($_GET['id'])){

        $id = $_GET['id'];

        $sql = "DELETE FROM productos WHERE id = $id";

        if ($connect->query($sql) === TRUE) {
            echo "Registro eliminado";
        } else {
            echo "Error: " . $sql . "<br>" . $connect->error;
        }

        $connect->close();
    }

?>