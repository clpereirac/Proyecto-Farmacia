<?php

include('db.php');



$sql = "SELECT * FROM productos";

if(isset($_GET['buscar'])){
    $buscar = $_GET['buscar'];

    $sql .= " WHERE nombre LIKE '%$buscar%'";
}


$result = $connect->query($sql);

if ($result->num_rows > 0) {

?>
    <div class="container-informacion-prod">
        <h2>Información rapida de los productos</h2>

        <div class="buscar-2">
            <label for="buscar">Buscar lotes</label>
            <br>
            <input type="text" name="nombre_producto" id="nombreProducto" placeholder="Buscar producto">
            <button onclick="javascript:busqueda()">Buscar</button>
        </div>

        <div class="container-card">

        <?php while ($row = $result->fetch_assoc()) { ?>
            <div class="card-prod">
                <div class="datos">
                    <h3>Nombre: <?php echo $row['nombre'] ?></h3>
                    <p><strong>Descripción: </strong><?php echo $row['descripcion'] ?></p>
                    <p><strong>Precio: </strong><?php echo $row['precio'] ?>$</p>
                    <p><strong>Stock: </strong><?php echo $row['stock'] ?></p>
                    <p><strong>Lote: </strong><?php echo $row['lote'] ?></p>
                </div>
                <img src="./img/<?php echo $row['fotografia'] ?>" alt="img">
            </div>
        <?php } ?>
        </div>
    </div>

    <?php 
}
    ?>