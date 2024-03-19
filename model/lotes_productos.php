<?php 

    include('db.php');

    $sql = "SELECT id, nombre, fotografia, stock, lote, l.id_lote, l.id_producto, l.fecha_vencimiento FROM productos p LEFT JOIN lotes_vencidos l ON l.id_producto = p.id";
    $result = $connect->query($sql);

    $fecha_actual = date('Y-m-d');
    $dias = date('d');
    $mes = date('m');

?>

<div class="lotes">
    <h2>Catalogo</h2>

    <div class="lotes-riesgo">
        <div class="titulo-lote">
            <p>Lotes en riesgo</p>
        </div>

        <table>
            <tr>
                <th>Codigo</th>
                <th>Producto</th>
                <th>Stock</th>
                <th>Lote</th>
                <th>Fecha de vencimiento</th>
                <th>Opciones</th>
            </tr>

                <?php while($row = $result->fetch_assoc()){

                    $vigente = 'lote-vigente';

                    //? Verificamos si el lote esta por vencer 
                    $por_vencer = '';
                    $fecha_limite = date('Y-m-d', strtotime(($fecha_actual . ' +10 days')));
                    if($row['fecha_vencimiento'] >= $fecha_actual && $row['fecha_vencimiento'] <= $fecha_limite){
                        $por_vencer = 'por-vencer';
                        $vigente = '';
                    }else{
                        $por_vencer = '';
                    }

                    //? Para ver si el lote esta vencido
                    $vencido = '';
                    if($row['fecha_vencimiento'] < $fecha_actual){
                        $vencido = 'lote-vencido';
                        $vigente = '';
                    }
                    else{
                        $vencido = '';
                    }
                        ?>
                        <tr>
                            <td class="<?php echo $vencido ?> <?php echo $por_vencer ?> <?php echo $vigente ?>"><?php echo $row['id_lote'] ?></td>
                            <td class="<?php echo $vencido ?> <?php echo $por_vencer ?> <?php echo $vigente ?>">
                                <img src="./img/<?php echo $row['fotografia'] ?>" alt="img" width="60px">
                                <p><?php echo $row['nombre'] ?></p>
                            </td>
                            <td class="<?php echo $vencido ?> <?php echo $por_vencer ?> <?php echo $vigente ?>"><?php echo $row['stock'] ?></td>
                            <td class="<?php echo $vencido ?> <?php echo $por_vencer ?> <?php echo $vigente ?>"><?php echo $row['lote'] ?></td>
                            <td class="<?php echo $vencido ?> <?php echo $por_vencer ?> <?php echo $vigente ?>"><?php echo $row['fecha_vencimiento'] ?></td>
                            <td class="<?php echo $vencido ?> <?php echo $por_vencer ?> <?php echo $vigente ?>">
                                <!-- <a href=""><button class="btn_pedido">Realizar Pedido</button></a> -->
                                <a href="javascript:desechar(<?php echo $row['id'] ?>)"><button class="btn_desechar">Desechar</button></a>
                            </td>
                        </tr>
                    <?php 
                }?>
        </table>
    </div>
</div>