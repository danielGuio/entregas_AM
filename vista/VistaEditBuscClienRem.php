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
        <title>Buscar cliente</title>
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
                    <h1>Buscar cliente</h1>
                    <p>
                        Puede realizar la busqueda de clientes por documento o por nombre, Obtendra una lista con el(los)
                        cliente(s), para editar un cliente determinado seleccione la opcion editar que estara al final de la fila 
                        de cada cliente encontrado
                    </p>             
                    <form action="" method="post" class="form-dg" id="formCliRemBusc">
                        <label class="label-radiobtn"><input type="radio" value="BusquedaDoc" name="RadioBuscCliRem" id="RadioBuscCliRemDoc">Buscar por documento</label>
                        <label class="label-radiobtn"><input type="radio" value="BusquedaNom" name="RadioBuscCliRem" id="RadioBuscCliRemNom">Buscar por nombre</label>
                        <label class="label-radiobtn"><input type="radio" value="BusquedaTodos" name="RadioBuscCliRem" id="RadioBuscCliRemTodos">Mostrar Lista completa de clientes</label>
                        <fieldset id="fielset-docu">
                            <h2>Buscar cliente por documento</h2>
                            <label>Documento de cliente:</label>                        
                            <input type="text" placeholder="Documento cliente" name="docclirem" id="docClirem" autocomplete="off" pattern="[A-Za-z0-9._-]{1,25}">
                        </fieldset>  
                        <fieldset id="fielset-nom">
                            <h2>Buscar cliente por nombre</h2>
                            <label>Nombre de cliente:</label> 
                            <input type="text" placeholder="Nombre cliente" name="nomclirem" id="nomclirem" autocomplete="off" pattern="[a-zA-ZÀ-ÿ\s]{1,40}">
                        </fieldset>
                        <p class="mens-error" id="mens-error-campvacio">El campo no puede estar vacio</p>
                        <div class="grupo-btn">
                            <input type="submit" name="BuscarCliRem" value="Buscar" id="BuscarCliRem" class="btn-buscar">
                        </div>
                    </form>
                    <p class="mens-error" id="mens-error-conslt">Consulta sin resultados<p>
                </div>
                <div class="container-tabla" id="container-table-clirembusc">
                    <table id="tablaclientesrem" class="tabla tablabuscEditcli">
                        <thead>
                            <tr>
                                <th>Documento</th>
                                <th>Tipo documento</th>
                                <th>Nombre</th>
                                <th>Direccion</th>
                                <th>Telefono</th>
                                <th>Email</th>
                                <th>Nombre contacto</th>
                                <th>poblacion</th>
                                <th>Control</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <div class="div-form-dg editarclirem" id="form-edit-cli">
                    <h1>Editar clientes</h1>

                    <form class="form-dg" autocomplete="off" action="" method="POST" id="form-crear-cliRem">
                        <div class="form-dg-column">
                            <div class="grupo_input">
                                <label for="docclirem" id="label_doccli">*Documento: </label>
                                <input type="text" name="docclirem" placeholder="Digite NIT/Cedula" id="docclirem" class="formulario-input" autofocus autocomplete="off">
                                <p id="error-doc" class="mens-error_form">6 a 15 digitos sin espacio</p>
                            </div>
                            <div class="grupo_input">
                                <label for="tipodocclirem" id="lbtipodoc">*Tipo Documento: </label>
                                <select name="tipodocclirem" class="formulario-input" id="tipodocclirem">
                                    <option></option>
                                    <option>NIT</option>
                                    <option>Cedula</option>
                                </select>
                                <p id="error-tipodoc" class="mens-error_form">Seleccione una opcion</p>
                            </div>
                            <div class="grupo_input">
                                <label for="nomclirem" id="lbnombre">*Nombre: </label>
                                <input type="text" name="nombreclirem" class="formulario-input" id="nombreclirem" autocomplete="off">
                                <p id="error-nombre" class="mens-error_form">Requerido - letras y espacio</p>
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
                                <label for="ubicasion" id="lbubicasion"> *Ubicasion: </label>
                                <input type="text" name="ubicasion" class="formulario-input" id="ubicasionclirem" placeholder="Digite la Poblacion">
                                <p id="error-ubic" class="mens-error_form">Debe seleccionar una opcion</p>
                            </div>                            
                            <div class="grupo_input">
                                <label for="contactoclirem" id="lbcontac">Persona de contacto: </label>
                                <input type="text" name="contactoclirem" id="contactoclirem" class="formulario-input" maxlength="50"> 
                                <p id="error-contac" class="mens-error_form">solo letras y espacio</p>
                            </div>
                        </div>
                        <div class="grupo-btn">
                            <input type="submit" class="btn-editar" name="btneditarCli" value="Aceptar" id="btneditarCli"> 
                        </div>                      
                    </form>      
                </div>
            </div> 
        </div>
        <script src="../js/AutoCompletar.js"></script>      
        <script src="../js/MenuBuscarCliRem.js"></script>      
    </body>
</html>
