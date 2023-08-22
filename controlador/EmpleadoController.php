<?php

require_once '../modelo/Empleado.php';
require_once '../modelo/EmpleadoCRUD.php';

$objcrudempleado = new EmpleadoCRUD();

if (isset($_POST['registrarEmpleado'])) {
    $cedula = $_POST['docEmpleado'];
    $nombre = $_POST['nomEmpleado'];
    $apellido = $_POST['apellEmpleado'];
    $usuario = $_POST['userEmpleado'];
    $clave = $_POST['claveEmpleado'];
    $tipo = $_POST['tipoEmpl'];

    $objEmpleadobusc = $objcrudempleado->buscarEmpleado($cedula);
    if ($objEmpleadobusc->getCedula() != 0) {
        echo "<script> alert('Ya existe un registro de empleado con ese numero de documento, por favor cambielo');
         window.location = '../vista/VistaCrearEmpleado.php'</Script>";
    } else {
        $objempleado = new Empleado($cedula, $nombre, $apellido, $usuario, $clave, $tipo);
        $bandera = $objcrudempleado->insertarEmpleado($objempleado);
        if ($bandera) {
            echo "<script> alert('Registro de empleado exitoso');
         window.location = '../vista/VistaCrearEmpleado.php'</Script>";
        } else {
            echo "<script> alert('Error al registrar el empleado');
         </Script>";
        }
    }
}

if (isset($_POST['buscarempleado'])) {
    $cedula = $_POST['cedulaempleado'];
    $objempleado = $objcrudempleado->buscarEmpleado($cedula);
    $cedula = $objempleado->getCedula();
    $nombre = $objempleado->getNombre();
    $apellido = $objempleado->getapellido();
    $usuario = $objempleado->getusuario();
    $clave = $objempleado->getClave();
    $tipo = $objempleado->getTipo();
    header("LOCATION: /entregas-am/vista/vistaCRUDEmpleado.php?cedula=$cedula&&nombre=$nombre");
}

