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
        <title>Crear cliente</title>
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
                    <h1>Registro de clientes</h1>
                    <form class="form-dg" autocomplete="off" action="../controlador/ClienteRemController.php" method="POST" id="form-crear-cliRem">
                        <div class="form-dg-column">
                            <div class="grupo_input">
                                <label for="tipodocclirem" id="lbtipodoc">*Tipo Documento: </label>
                                <select name="tipodocclirem" class="formulario-input" id="tipodocclirem">
                                    <option></option>
                                    <option id="nitclirem">NIT</option>
                                    <option id="cedulaclirem">Cedula</option>
                                </select>
                                <p id="error-tipodoc" class="mens-error_form">Seleccione una opcion</p>
                            </div>
                            <div class="grupo_input">
                                <label for="docclirem" id="label_doccli">*Documento: </label>
                                <input type="text" name="docclirem" placeholder="Digite NIT/Cedula" id="docclirem" class="formulario-input" autofocus autocomplete="off">
                                <p id="error-doc" class="mens-error_form">6 a 15 digitos sin espacio</p>
                            </div>
                            <div class="grupo_input">
                                <label for="digitverclirem" id="label_digVercli" class="label-deshabilitado">*Digito de verificacion: </label>
                                <input type="text" name="digitverclirem" placeholder="Digite digito de verificacion" id="digitverclirem" class="formulario-input formulario-input-deshabilitado" autofocus autocomplete="off" disabled>
                                <p id="error-digitVer" class="mens-error_form">2 digitos sin espacio</p>
                            </div>
                            <div class="grupo_input">
                                <label for="nomclirem" id="lbnombre" class="label-deshabilitado">*Nombre: </label>
                                <input type="text" name="nombreclirem" class="formulario-input formulario-input-deshabilitado" id="nombreclirem" autocomplete="off" disabled>
                                <p id="error-nombre" class="mens-error_form">Requerido - letras y espacio</p>
                            </div>
                            <div class="grupo_input">
                                <label for="apellclirem" id="lbapellido" class="label-deshabilitado">*Apellido: </label>
                                <input type="text" name="apellidoclirem" class="formulario-input formulario-input-deshabilitado" id="apellidoclirem" autocomplete="off" disabled>
                                <p id="error-apellido" class="mens-error_form">Requerido - letras y espacio</p>
                            </div>
                            <div class="grupo_input">
                                <label for="razonclirem" id="lbrazon" class="label-deshabilitado">*Razon social: </label>
                                <input type="text" name="razonclirem" class="formulario-input formulario-input-deshabilitado" id="razonclirem" autocomplete="off" disabled>
                                <p id="error-razon" class="mens-error_form">Requerido - letras y espacio</p>
                            </div>
                            <div class="grupo_input">
                                <label for="direccionclirem" id="lbdireccion">*Direccion: </label>
                                <input type="text" name="direccionclirem" class="formulario-input" id="direccionclirem" autocomplete="off">
                                <p id="error-direccion" class="mens-error_form">requerido - maximo 50 caracteres</p>
                            </div>
                            <div class="grupo_input">
                                <label for="telefonoclirem" id="lbtelefono">*Telefono: </label>
                                <input type="tel" name="telefonoclirem" id="telefonoclirem" class="formulario-input" maxlength="10">
                                <p id="error-telefono" class="mens-error_form">Numeros 7 a 10 caracteres</p>
                            </div>
                            <div class="grupo_input">
                                <label for="emailclirem" id="lbemail" >email: </label>
                                <input type="email" name="emailclirem" id="emailclirem" class="formulario-input" autocomplete="off">
                                <p id="error-email" class="mens-error_form">Formato de correo invalido</p>
                            </div>
                            <div class="autocompletar" >
                                <label for="ciudad" id="lbCiudad">*Ciudad: </label>
                                <input type="text" name="ciudad" class="formulario-input" id="ciudadclirem" placeholder="Digite la ciudad">
                                <p id="error-ciudad" class="mens-error_form">Debe seleccionar una opcion</p>
                            </div>  
                            <div class="autocompletar" >
                                <label for="ubicasion" id="lbubicasion">Poblacion: </label>
                                <input type="text" name="ubicasion" class="formulario-input" id="ubicasionclirem" placeholder="Digite la Poblacion">
                                <p id="error-ubic" class="mens-error_form">Debe seleccionar una opcion</p>
                            </div>                            
                            <div class="grupo_input">
                                <label for="contactoclirem" id="lbcontac">Persona de contacto: </label>
                                <input type="text" name="contactoclirem" id="contactoclirem" class="formulario-input" maxlength="50"> 
                                <p id="error-contac" class="mens-error_form">solo letras y espacio</p>
                            </div>
                            <div class="grupo_input">
                                <label for="asesorclirem" id="lbasesor">Asesor: </label>
                                <input type="text" name="asesorclirem" id="asesorclirem" class="formulario-input" maxlength="50"> 
                                <p id="error-asesor" class="mens-error_form">solo letras y espacio</p>
                            </div>
                        </div>
                        <div class="grupo-btn">
                            <input type="submit" class="btn-registrar" name="registrarClirem" value="Registrar" id="registrarClirem"> 
                            <a href="VistaEditBuscClienRem.php">Ir a Buscar/Editar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="../js/validacionFormularios/FormCrearCliRem.js"></script>
        <script src="../js/AutoCompletar.js"></script>

    </body>
</html>
