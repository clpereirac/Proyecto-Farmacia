<?php

    $server = 'localhost';
    $user = 'root';
    $password = '';
    $dataBase = 'farmacia';

    try{
        $connect = new mysqli($server, $user, $password, $dataBase);
        // echo "Conexión existosa";
    } catch (PDOException $Error){
        echo "Error en la conexión" . $Error->getMessage();
    }

?>