<?php

require_once '../modelo/ClienteRem.php';
require_once '../modelo/ClienteRemCRUD.php';
require_once '../modelo/UbicacionCRUD.php';

$objClienteRemCrud = new ClienteRemCRUD();
$objUbicacioncrud = new UbicacionCRUD();
$btnbuscar = "";
$banderavalidar;

if (isset($_POST['registrarClirem'])) {
    $documento = $_POST['docclirem'];
    $tipoDocumento = $_POST['tipodocclirem'];
    $nombre = $_POST['nombreclirem'];
    $direccion = $_POST['direccionclirem'];
    $telefono = $_POST['telefonoclirem'];
    $email = $_POST['emailclirem'];
    $nomcontacto = $_POST['contactoclirem'];
    $ubicasionform = $_POST['ubicasion'];

    $objUbicacion = $objUbicacioncrud->ubicacionNombre($ubicasionform);
    if ($objUbicacion->getIdPoblacion() == 0) {
        echo "<script> alert('Poblacion errada, debe digitar y seleccionar una de las opciones');
  window.location = '../vista/ViewCrearClienRem.php'</Script>";
    } else {
        $objClienteRem = new ClienteRem($documento, $tipoDocumento, $nombre, $direccion, $telefono, $email, $nomcontacto, $objUbicacion->getIdPoblacion());
        $banderavalidar = $objClienteRemCrud->insertarCliente($objClienteRem);
        if ($banderavalidar == true) {
            $banderavalidar = "mensage enviado";
            echo "<script> alert('Registro de cliente exitoso');
  window.location = '../vista/ViewCrearClienRem.php'</Script>";
            //header("Location: /entregas-am/vista/ViewCrearClienRem.php?bandera=$banderavalidar");
            die();
        } else {
            echo "<script> alert('Error al registrar el cliente, intentelo nuevamente');
  window.location = '../vista/ViewCrearClienRem.php'</Script>";
        }
    }
}

if (isset($_POST['btnbuscar'])) {
    if ($_POST['btnbuscar'] == true) {
        $documento = $_POST['docclirem'];
        $nombre = $_POST['nomclirem'];
        if ($documento != "") {
            $objClienteRem = $objClienteRemCrud->buscarclirendoc($documento);
            if ($objClienteRem->getDocumento() == 0) {
                echo json_encode("sinClienterembd");
            } else {
                $clientearray = array($objClienteRem->getDocumento(), $objClienteRem->getTipoDocumento(),
                    $objClienteRem->getNombre(), $objClienteRem->getDireccion(), $objClienteRem->getTelefono(),
                    $objClienteRem->getEmail(), $objClienteRem->getNombrecontacto(), $objClienteRem->getUbicasion());
                echo json_encode($clientearray);
            }
        } elseif ($nombre != "") {
            $listaclienRem = array();
            $listaclienRem = $objClienteRemCrud->buscarcliremnom($nombre);
            $clientearrays = array();
            if (count($listaclienRem)) {
                for ($i = 0; $i < count($listaclienRem); $i++) {
                    $clientearray = array($listaclienRem[$i]->getDocumento(), $listaclienRem[$i]->getTipoDocumento(),
                        $listaclienRem[$i]->getNombre(), $listaclienRem[$i]->getDireccion(), $listaclienRem[$i]->getTelefono(),
                        $listaclienRem[$i]->getEmail(), $listaclienRem[$i]->getNombrecontacto(), $listaclienRem[$i]->getUbicasion());
                    array_push($clientearrays, $clientearray);
                }
                echo json_encode($clientearrays);
            } else {
                echo json_encode("sinClienterembd");
            }
        } else if($nombre == "" && $documento == "") {
            $listaclienRem = array();
            $listaclienRem = $objClienteRemCrud->buscarcliremTodos();
            $clientearrays = array();
            if (count($listaclienRem)) {
                for ($i = 0; $i < count($listaclienRem); $i++) {
                    $clientearray = array($listaclienRem[$i]->getDocumento(), $listaclienRem[$i]->getTipoDocumento(),
                        $listaclienRem[$i]->getNombre(), $listaclienRem[$i]->getDireccion(), $listaclienRem[$i]->getTelefono(),
                        $listaclienRem[$i]->getEmail(), $listaclienRem[$i]->getNombrecontacto(), $listaclienRem[$i]->getUbicasion());
                    array_push($clientearrays, $clientearray);
                }
                echo json_encode($clientearrays);
            } else {
                echo json_encode("sinClienterembd");
            }
        }
    }
}

if (isset($_POST['btneditar'])) {//btn editar viene de MenuBuscarCliRem.js en la function dataedit
    if ($_POST['btneditar'] == true) {
        $documentoinicial = $_POST['documentoinicial'];
        $documento = $_POST['documento'];
        $tipoDocumento = $_POST['tipoDoc'];
        $nombre = $_POST['nombre'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];
        $email = $_POST['email'];
        $nombrecontacto = $_POST['contacto'];
        $ubicasionform = $_POST['ubicasion'];

        $objUbicacion = $objUbicacioncrud->ubicacionNombre($ubicasionform);
        if ($objUbicacion->getIdPoblacion() == 0) {
            echo json_encode("PoblacionNula");
        } else {
            if ($documentoinicial != $documento) {
                $objClienteRem = $objClienteRemCrud->buscarclirendoc($documento);
                if ($objClienteRem->getDocumento() != 0) {
                    echo json_encode("ClienteExistente");
                } else {
                    $objClienteRem = new ClienteRem($documento, $tipoDocumento, $nombre, $direccion, $telefono, $email, $nombrecontacto, $objUbicacion->getIdPoblacion());
                    $banderavalidar = $objClienteRemCrud->editarclienterem($objClienteRem, $documentoinicial);
                    if ($banderavalidar == true) {
                        echo json_encode("ClienteModificado");
                    } else {
                        echo json_encode("ClienteNoModificado");
                    }
                }
            } else {
                $objClienteRem = new ClienteRem($documento, $tipoDocumento, $nombre, $direccion, $telefono, $email, $nombrecontacto, $objUbicacion->getIdPoblacion());
                $banderavalidar = $objClienteRemCrud->editarclienterem($objClienteRem, $documentoinicial);
                if ($banderavalidar == true) {
                    echo json_encode("ClienteModificado");
                } else {
                    echo json_encode("ClienteNoModificado");
                }
            }
        }
    }
}

