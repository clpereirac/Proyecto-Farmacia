    
    <script src="./controllers/script.js"></script>
    <h1>Lista de Productos</h1>
    <div class="buscar">
        <label for="buscar">Buscar</label>
        <input type="text" name="nombre_producto" id="nombre_producto" placeholder="Buscar producto">
        <button onclick="javascript:buscar()">Buscar</button>
    </div>

    <?php
    include('db.php');

    $sql = "SELECT id, nombre, fotografia, descripcion, precio, stock, fecha_de_vencimiento, lote FROM productos";

    if (isset($_GET['buscar'])) {
        $buscar = $_GET['buscar'];
        $sql .= " WHERE nombre LIKE '%$buscar%'";
    }

    
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
    ?>

        <div class="contaniner-productos">

            <table class="tabla-productos">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Fotografia</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Fecha de vencimiento</th>
                    <th>Lote</th>
                    <th>Operarciones</th>
                </tr>
                <?php while ($row = $result->fetch_assoc()) { ?>

                    <tr>
                        <td><?php echo $row["id"]; ?></td>
                        <td><?php echo $row["nombre"]; ?></td>
                        <td><img src="./img/<?php echo $row["fotografia"]; ?>" alt="img" width="80px"></td>
                        <td><?php echo $row["descripcion"]; ?></td>
                        <td><?php echo $row["precio"]; ?></td>
                        <td><?php echo $row["stock"]; ?></td>
                        <td><?php echo $row["fecha_de_vencimiento"]; ?></td>
                        <td><?php echo $row["lote"]; ?></td>
                        <td>
                            <a href="javascript:update(<?php echo $row["id"] ?>)"><button class="btn_editar">Actualizar</button></a>
                            <a href="javascript:deleteProducto(<?php echo $row["id"] ?>)"><button class="btn_eliminar">Eliminar</button></a>
                        </td>

                    </tr>
                <?php } ?>
            </table>

        <?php
    } else {
        ?>
            <p>No existe registros que mostrar</p>
        <?php } ?>
        <!-- <a href="form_alumnos.php"><button class="btn_registro">Regitrar Alumno</button></a> -->
        </div>