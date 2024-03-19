<?php

    include('db.php');

    if(isset($_POST['id'])){

        $id = $_POST['id'];

        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $stock = $_POST['stock'];
        $fecha_de_vencimiento = $_POST['fecha_de_vencimiento'];
        $lote = $_POST['lote'];
        $fotografia_actual = $_POST['fotografia_actual'];


        if (!empty($_FILES['fotografia']['name'])) {

            $archivo_original = $_FILES['fotografia']['name'];
            $arreglo_img = explode(".", $archivo_original);
            $extension = end($arreglo_img);
            $fotografia = uniqid() . '.' . $extension;

            if(copy($_FILES['fotografia']['tmp_name'], '../img/' . $fotografia)){

                unlink("../img/$fotografia_actual");
            }else{
                echo "Error al cargar la imagen.";
                exit;
            }
    
            $sql = "UPDATE productos  SET fotografia = '$fotografia', nombre = '$nombre', descripcion = '$descripcion', precio = $precio, stock = $stock, lote = '$lote' WHERE id = $id";
            
            // para los lotes 
            $sql_lotes = "UPDATE lotes_vencidos SET fecha_vencimiento = '$fecha_de_vencimiento' WHERE id_producto = $id";
            
        }else{
            $sql = "UPDATE productos SET nombre = '$nombre', descripcion = '$descripcion', precio = $precio, stock = $stock, lote = '$lote' WHERE id = $id";
            $sql_lotes = "UPDATE lotes_vencidos SET fecha_vencimiento = '$fecha_de_vencimiento' WHERE id_producto = $id";
        }
    
        if ($connect->query($sql) === TRUE && $connect->query($sql_lotes) === TRUE) {
            echo "Se actualizó correctamente";
        } else {
            echo "Error: " . $sql . "<br>" . $connect->error;
        }
        $connect->close();

    }

?>