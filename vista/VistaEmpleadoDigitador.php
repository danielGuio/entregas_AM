<?php
session_start();
$usuario = $_SESSION['usuario'];
$tipousuario = $_SESSION['tipoempleado'];
$nombre = $_SESSION['nombre'];
$apellido = $_SESSION['apellido'];
?>
<html>
    <head>
        <link rel="stylesheet" href="../css/EstilosDg.css"/>
        <title>Empleado digitador</title>
    </head>
    <body>
        <div class="container">
            <header class="header-dg">
                <div class="header_logo">
                    <img src="../img/logo.png" alt="Logo entregas AM"/>
                </div>
            
                <div class="header_usuario">               
                    <div class="header_usuario-texto">
                        <p><?php echo $nombre." ".$apellido?></p>
                        <a href="../config/cerrarSesion.php">Cerrar sesion</a>
                    </div>
                    <div class="header_usuario_logo">
                        <img src="../img/perfil-del-usuario.png" alt="Logo entregas AM"/> 
                    </div>                       
                </div>     
            </header>
            <div class="container-contbody">
                <div class="cont-opciones" id="div_gets_guia">
                    <p>Gestion de Guia</p>
                    <img src="../img/Img_Guia.png" alt="Imagen guia AM" class="img-guia" id="img-guia"/>
                    <ul id="list-guia" class="list-cont-opciones">
                        <li><a href="#">Crear Guia</a></li>
                        <li><a href="#">Buscar/Editar Guia</a></li>
                    </ul> 
                </div>
                <div class="cont-opciones" id="div_gest_empleados">
                   <p>Gestion de Empleados</p>
                   <img src="../img/empleado.png" alt="Imagen empleado" id="img-empleado"/>
                    <ul id="list-empleado" class="list-cont-opciones">
                        <li><a href="VistaCrearEmpleado.php">Crear Empleado</a></li>
                        <li><a href="VistaEditBuscEmpleado.php">Buscar/Editar Empleado</a></li>
                    </ul> 
                </div>
                <div class="cont-opciones" id="div_gets_cli_rem">
                    <p>Gestion de Cliente Remitente</p>
                    <img src="../img/remitente.png" alt="Img Remitente"  id="img-cli-rem">
                    <ul id="list-clienteremi" class="list-cont-opciones">
                        <li><a href="ViewCrearClienRem.php">Crear cliente</a></li>
                        <li><a href="VistaEditBuscClienRem.php">Buscar/Editar Cliente</a></li>
                    </ul>                                 
                </div>
                <div class="cont-opciones" id="div_gets_cli_dest">
                   <p>Gestion de Cliente Destinatario</p>
                   <img src="../img/destinatario.png" alt="Img Destinatario"  id="img-cli-dest">
                    <ul id="list-cliente_dest" class="list-cont-opciones">
                        <li><a href="#">Crear cliente</a></li>
                        <li><a href="#">Buscar/Editar Cliente</a></li>
                    </ul>  
                </div>
                <div class="cont-opciones" id="div_gets_pobl">
                    <p>Gestion de Poblaciones</p>
                    <img src="../img/poblacion.png" alt="Imagen-mapa" class="img-mapa" id="img-poblacion-mapa"/>
                    <ul id="list-pobla" class="list-cont-opciones">
                        <li><a href="#">Crear Poblacion</a></li>
                        <li><a href="#">Buscar/Editar Poblacion</a></li>
                    </ul>   
                </div>
                <div class="cont-opciones" id="div_gest_ruta">
                    <p>Gestion de Ruta</p>
                    <img src="../img/ruta.png" alt="Imagen-ruta" id="img-ruta"/>
                    <ul id="list-ruta" class="list-cont-opciones">
                        <li><a href="#">Crear Ruta</a></li>
                        <li><a href="#">Buscar/Editar Rutas</a></li>
                    </ul>   
                </div>
            </div>
        </div>     
        <script src="../js/MenuCajasEmpleado.js"></script>
    </body>
</html>

