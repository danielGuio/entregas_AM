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
        <title>Empleado</title>
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
                    <h1>Registro de Empleados</h1>
                    <form class="form-dg" autocomplete="off" action="../controlador/EmpleadoController.php" method="POST" id="form-crarEmpleado">
                        <div class="form-dg-column">
                            <div class="grupo_input">
                                <label for="docEmpleado" id="label_doc_empl">*Documento: </label>
                                <input type="text" name="docEmpleado" placeholder="Cedula" id="docEmpleado" class="formulario-input" autofocus autocomplete="off">
                                <p id="error-doc" class="mens-error_form">6 a 15 digitos sin espacio</p>
                            </div>
                            <div class="grupo_input">
                                <label for="nomEmpleado" id="label_nomEmp">*Nombre: </label>
                                <input type="text" name="nomEmpleado" placeholder="Nombre" id="nomEmpleado" class="formulario-input" autocomplete="off">
                                <p id="error-nombre" class="mens-error_form">Campo obligatorio maximo 40 digitos</p>
                            </div>
                            <div class="grupo_input">
                                <label for="apellEmpleado" id="label_apell">*Apellido: </label>
                                <input type="text" name="apellEmpleado" placeholder="Apellido" id="apellEmpleado" class="formulario-input" autocomplete="off">
                                <p id="error-ape" class="mens-error_form">Campo obligatorio maximo 40 digitos</p>
                            </div>   
                            <div class="grupo_input">
                                <label for="userEmpleado" id="label_user">*Usuario: </label>
                                <input type="text" name="userEmpleado" placeholder="Usuario" id="userEmpleado" class="formulario-input" autocomplete="off">
                                <p id="error-user" class="mens-error_form">Campo obligatorio maximo 40 digitos</p>
                            </div>   
                            <div class="grupo_input">
                                <label for="claveEmpleado" id="label_clave">*Contraseña: </label>
                                <input type="text" name="claveEmpleado" placeholder="Contraseña" id="claveEmpleado" class="formulario-input" autocomplete="off">
                                <p id="error-clave" class="mens-error_form">Campo obligatorio 4 a 10 digitos</p>
                            </div>
                            <div class="grupo_input">
                                <label for="tipoEmpleado" id="label_tipo">*Tipo Empleado: </label>
                                <select class="formulario-input" id="tipoEmpl" name="tipoEmpl">
                                    <option></option>
                                    <option>Oficina</option>
                                    <option>Administrador</option>
                                </select>
                                <p id="error-tipo" class="mens-error_form">Campo obligatorio seleccione una opcion</p>
                            </div>  
                        </div>
                        <div class="grupo-btn">
                            <input type="submit" class="btn-registrar" name="registrarEmpleado" value="Registrar" id="registrarEmpleado"> 
                            <a href="VistaEditBuscEmpleado.php">Ir a Buscar/Editar</a>
                        </div>
                    </form>
                </div>  
            </div>
        </div>
    </body>
    <script src="../js/validacionFormularios/formEmpleados.js"></script>
</html>
