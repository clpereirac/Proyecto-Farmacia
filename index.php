<?php
    session_start();

    if(!isset($_SESSION['nombre'])){
        header('Location:login.html');
        // die("Debe Loguearse");
    }
?>


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
                <div><a href="javascript:cargarContenido('./model/form-procesar-venta.php')">Procesar venta</a></div>
                <div><a href="javascript:cargarContenido('./model/lotes_productos.php')">Lostes de productos</a></div>
                <div><a href="javascript:mostrarMedicamentos()">Información de productos</a></div>
                <div><a href="javascript:cargarContenido('model/factura-venta.php')">Detalles venta</a></div>
            </div>
        </div>

        <div class="container">
            <div class="navigation">
                <ul>
                    <li><a href="">Home</a></li>
                    <li>Contactos</li>
                </ul>
                <p>
                    <a href="./controllers/cerrar_sesion.php">Cerrar sesion</a>
                </p>
            </div>

            <!-- Aqui cargamos todos los archivos -->
            <div class="menu" id="menu">
                
            
                <header>
                    <div class="logo">
                        <img src="https://content.wepik.com/statics/25800831/preview-page0.jpg" alt="Farmacia Salud y Bienestar">
                    </div>
                    <h1>Farmacia Salud y Bienestar</h1>
                </header>
                <main>
                    <section class="banner">
                        <img src="https://www.lauragutierrezr.com/uploads/1CSug0dM/63180-farmacia-laura-gutierrez-rodriguez-banner.jpg" alt="Imagen de una farmacia">
                        <div class="texto-banner">
                            <h2>Tu salud, nuestra prioridad</h2>
                            <p>Encuentra todo lo que necesitas para tu cuidado y bienestar.</p>
                            <a href="">Conoce más</a>
                        </div>
                    </section>
                    <section class="servicios">
                        <h2>Nuestros servicios</h2>
                        <ul>
                            <li>
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcThJgl-Fey_FnWDDjhWCurOLIT8Pd0IQ2x3kpMWrL0D89gWr_aagID99w1co1DzV9AvIt8&usqp=CAU" alt="Medicamentos">
                                <h3>Medicamentos</h3>
                                <p>Amplio surtido de medicamentos genéricos y de marca.</p>
                            </li>
                            <li>
                                <img src="https://www.consalud.es/uploads/s1/72/11/jornadanaanefp_consalud.jpg" alt="Dermocosmética">
                                <h3>Dermocosmética</h3>
                                <p>Productos para el cuidado de la piel y el cabello.</p>
                            </li>
                            <li>
                                <img src="https://assets1.farmaciasanpablo.com.mx/landings/HardSell/EstacionOfertas2023/06-CuidadoPersonal/Slider02-CuidadoPersonal-EDO23-Sem07-m-v1@2x.jpg" alt="Cuidado personal">
                                <h3>Cuidado personal</h3>
                                <p>Productos para la higiene y el bienestar personal.</p>
                            </li>
                            <li>
                                <img src="https://pasteurio.vtexassets.com/assets/vtex.file-manager-graphql/images/4125bc1b-6d07-4198-94a8-22d4979c264f___ebd69d0b9cc9dfb0968caa64ed7f79f7.jpg" alt="Bebé">
                                <h3>Bebé</h3>
                                <p>Productos para el cuidado del bebé y la madre.</p>
                            </li>
                        </ul>
                    </section>
                    <section class="testimonios">
                        <h2>Testimonios</h2>
                        <ul>
                            <li>
                                <blockquote>
                                    "Siempre encuentro lo que necesito en esta farmacia. El personal es muy amable y atento."
                                </blockquote>
                                <p>- Ana García</p>
                            </li>
                            <li>
                                <blockquote>
                                    "Me encanta la variedad de productos que tienen. Además, los precios son muy competitivos."
                                </blockquote>
                                <p>- Juan Pérez</p>
                            </li>
                        </ul>
                    </section>
                </main>
                <footer>
                    <p>Farmacia Salud y Bienestar - Todos los derechos reservados.</p>
                </footer>


            </div>

            <div class="footer">
                <p>Contactanos por 765352663</p>
            </div>
        </div>
    </div>
</body>
</html>

