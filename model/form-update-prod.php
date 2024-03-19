
<?php

    include('db.php');
    $id = $_GET['id'];

    // echo 'El id seleccionado es: ' .$id;

    // $sql = "SELECT * FROM productos WHERE id = $id";
    $sql = "SELECT fotografia, nombre, descripcion, precio, stock, lote, l.fecha_vencimiento FROM productos p LEFT JOIN lotes_vencidos l ON p.id = l.id_producto WHERE p.id = $id AND l.id_producto = $id";
    $result = $connect->query($sql);
    $row = $result->fetch_assoc();
?>



<div class="formulario-agragar-prductos">
    <h2>Formulario para agreagar productos</h2>

    <form action="javascript:actualizarProducto()" method="post" id="form-update" enctype="multipart/form-data">
        <div>
            <label for="fotografia">Fotografia:</label>
            <br>
            <img src="./img/<?php echo $row['fotografia']; ?>" alt="img" width="200px">
            <br>
            <input type="file" name="fotografia" value="<?php echo $row['fotografia']; ?>">
        </div>
        <div>
            <label for="nombre">Nombre producto:</label>
            <input type="text" name="nombre" value="<?php echo $row['nombre']; ?>">
        </div>
        <div>
            <label for="descripcion">Descripción:</label>
            <input type="text" name="descripcion" value="<?php echo $row['descripcion']; ?>">
        </div>
        <div>
            <label for="precio">Precio:</label>
            <input type="number" name="precio" value="<?php echo $row['precio']; ?>">
        </div>
        <div>
            <label for="stock">Stock:</label>
            <input type="number" name="stock" value="<?php echo $row['stock']; ?>">
        </div>
        <div>
            <label for="fecha_de_vencimiento">Fecha de vencimiento:</label>
            <input type="date" name="fecha_de_vencimiento" value="<?php echo $row['fecha_vencimiento']; ?>">
        </div>
        <div>
            <label for="lote">Lote:</label>
            <input type="text" name="lote" value="<?php echo $row['lote']; ?>">
        </div>
        <div class="botom">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="hidden" name="fotografia_actual" value="<?php echo $row['fotografia']; ?>">
            <button type="submit" class="btn_registrar">Actualizar</button>
        </div>
        
    </form>
</div>