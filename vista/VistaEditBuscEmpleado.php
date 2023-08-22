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
        <title>Buscar editar empleado</title>
    </head>
    <body>
        <div class="container">
            <header class="header-dg">
                <div class="header_logo">
                    <img src="../img/logo.png" alt="Logo entregas AM"/>
                </div>      
                <div class="header_usuario">               
                    <div class="header_usuario-texto">
                        <p><?php echo $nombre . " " . $apellido ?></p>
                        <a href="../config/cerrarSesion.php">Cerrar sesion</a>
                        <a href="VistaEmpleadoDigitador.php" class="dGbutton">Menu Principal</a>
                    </div>
                    <div class="header_usuario_logo">
                        <img src="../img/perfil-del-usuario.png" alt="Logo entregas AM"/> 
                    </div>                       
                </div>     
            </header>
            <div class="container-contbody"> 
                <div class="div-form-dg">
                    <h1>Buscar de Empleados</h1>
                    <form method="POST" id="form-busc-empleado" class="form-dg">
                        <label class="label-radiobtn"><input type="radio" value="BusquedaDoc" name="RadioBusc" id="RadioBuscDoc">Buscar por documento</label>
                        <label class="label-radiobtn"><input type="radio" value="BusquedaNom" name="RadioBusc" id="RadioBuscNom">Buscar por nombre</label>
                        <label class="label-radiobtn"><input type="radio" value="BusquedaTodos" name="RadioBusc" id="RadioBuscTodos">Mostrar Lista completa de empleados</label>
                        <fieldset id="fielset-docu">
                            <h2>Buscar empleado por documento</h2>
                            <label>Documento de Empleado:</label>                        
                            <input type="text" placeholder="Documento empleado" name="doc" id="doc" autocomplete="off" pattern="[A-Za-z0-9._-]{1,25}">
                        </fieldset>  
                        <fieldset id="fielset-nom">
                            <h2>Buscar empleado por nombre</h2>
                            <label>Nombre de empleado:</label> 
                            <input type="text" placeholder="Nombre empleado" name="nom" id="nom" autocomplete="off" pattern="[a-zA-ZÀ-ÿ\s]{1,40}">
                        </fieldset>
                        <p class="mens-error" id="mens-error-campvacio">El campo no puede estar vacio</p>
                        <div class="grupo-btn">
                            <input type="submit" name="BuscarEmpleado" value="Buscar" id="BuscarEmpleado" class="btn-buscar">
                        </div>
                    </form>
                </div>  
            </div>
        </div>
        <script src="../js/MenubuscEditEmpleado.js"></script>
    </body>
</html>

