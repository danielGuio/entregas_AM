<?php
require_once '../modelo/Empleado.php';
require_once '../modelo/EmpleadoCRUD.php';

$usuarioform = $_POST['usuariologin'];
$claveform = $_POST['clavelogin'];

if ($usuarioform == "" || $claveform == "") {
    echo json_encode('Campos vacios');
} else {
    $objcrudempleado = new EmpleadoCRUD();
    $objempleado = $objcrudempleado->buscarEmpleadoLogin($usuarioform, $claveform);
    loginuser($objempleado);
}
function loginuser(Empleado $objempleado) {

    if ($objempleado->getNombre() != 0) {
        $cedula = $objempleado->getCedula();
        $nombre = $objempleado->getNombre();
        $apellido = $objempleado->getapellido();
        $tipoempleado = $objempleado->getTipo();
        $usuario = $objempleado->getusuario();

        session_start();
        $_SESSION['cedula'] = $cedula;
        $_SESSION['nombre'] = $nombre;
        $_SESSION['apellido'] = $apellido;
        $_SESSION['tipoempleado'] = $tipoempleado;
        $_SESSION['usuario'] = $usuario;
        echo json_encode($objempleado->getTipo());
    } else {
        echo json_encode("Objeto nulo");
    }
}
