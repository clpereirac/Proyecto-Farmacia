<?php
include 'Conexion.php';

class Producto
{
    var $objetos;

    public function __construct()
    {
        $db = new Conexion();
        $this->acceso = $db->pdo;
    }

    function crear($nombre, $concentracion, $adicional, $precio, $laboratorio, $tipo, $presentacion, $avatar)
    {
        $sql = "SELECT id_producto FROM producto WHERE nombre=:nombre AND concentracion=:concentracion AND adicional=:adicional AND prod_lab=:laboratorio AND prod_tip_prod=:tipo AND prod_present=:presentacion";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':nombre' => $nombre, ':concentracion' => $concentracion, ':adicional' => $adicional, ':laboratorio' => $laboratorio, ':tipo' => $tipo, ':presentacion' => $presentacion));
        $this->objetos = $query->fetchAll();

        if (!empty($this->objetos)) {
            echo 'noadd';
        } else {
            $sql = "INSERT INTO producto(nombre, concentracion, adicional, precio, prod_lab, prod_tip_prod, prod_present, avatar) VALUES (:nombre, :concentracion, :adicional, :precio, :laboratorio, :tipo, :presentacion, :avatar)";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':nombre' => $nombre, ':concentracion' => $concentracion, ':adicional' => $adicional, ':laboratorio' => $laboratorio, ':tipo' => $tipo, ':presentacion' => $presentacion, ':precio' => $precio, ':avatar' => $avatar));
            echo 'add';
        }
    }

    function buscar()
    {
        if (!empty($_POST['consulta'])) {
            $consulta = $_POST['consulta'];
            $sql = "SELECT * FROM laboratorio WHERE nombre LIKE :consulta";
            $query = $this->acceso->prepare($sql);
            $query->objetos = $query->fetchAll();
            return $this->objetos;
        } else {
            $sql = "SELECT * FROM laboratorio WHERE nombre NOT LIKE '' ORDER BY id_laboratorio LIMIT 25";
            $query = $this->acceso->prepare($sql);
            $this->objetos = $query->fetchAll();
            return $this->objetos;
        }
    }
}
?>
