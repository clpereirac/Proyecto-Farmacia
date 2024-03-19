<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmacia</title>
    <link rel="stylesheet" href="./css/styles.css">
    <script src="./controllers/script.js"></script>
</head>
<body>
    <div class="principal">
        <!-- Columna de opciones -->
        <div class="opciones">
            <div class="farmacia">
                <img src="./img/perfil.jpeg" alt="img">
                <h2>FARMACIA</h2>
            </div>
            <div class="perfil">
                <img src="./img/foto-perfil.png" alt="img">
                <h2>Claudia</h2>
            </div>

            <div class="almacen">
                <h2>Almacen</h2>
                <!-- <div><a href="javascript:cargarContenido('./model/productos.php')">Lista Producto</a></div> -->
                <div onclick="options()" id="productos">Productos</div>
                <div><a href="javascript:cargarContenido('./model/form-registro_cliente.php')">Registrar cliente</a></div>
                <div><a href="">Procesar compra</a></div>
                <div><a href="javascript:cargarContenido('./model/lotes_productos.php')">Lostes de productos</a></div>
                <div><a href="javascript:mostrarMedicamentos()">Información de productos</a></div>
            </div>
        </div>

        <div class="container">
            <div class="navigation">
                <ul>
                    <li>Home</li>
                    <li>Contactos</li>
                </ul>
                <p>
                    <a href="">Cerrar sesion</a>
                </p>
            </div>

            <!-- Aqui cargamos todos los archivos -->
            <div class="menu" id="menu">
                
            </div>

            <div class="footer">
                <p>Contactanos por 765352663</p>
            </div>
        </div>
    </div>
</body>
</html>

