<?php

class Empleado{
private $cedulaEmpleado;
private $nombreEmpleado;
private $apellidoEmpleado;
private $usuarioEmpleado;
private $claveEmpleado;
private $tipoEmpleado;

function __construct($cedulaEmpleado,$nombreEmpleado, $apellidoEmpleado, $usuarioEmpleado, $claveEmpleado, $tipoEmpleado) {
    
    $this->cedulaEmpleado = $cedulaEmpleado;
    $this->nombreEmpleado = $nombreEmpleado;
    $this->apellidoEmpleado = $apellidoEmpleado;
    $this->usuarioEmpleado = $usuarioEmpleado;
    $this->claveEmpleado = $claveEmpleado;
    $this->tipoEmpleado = $tipoEmpleado;
}


function setcedula($cedulaEmpleado){
    $this->cedulaEmpleado = $cedulaEmpleado;
}

function getCedula(){
    return $this->cedulaEmpleado;
}

function setNombre($nombreEmpleado){
    $this->nombreEmpleado = $nombre;
}

function getNombre(){
    return $this->nombreEmpleado;
}

function setApellido($apellidoEmpleado){
    $this->apellidoEmpleado = $apellidoEmpleado;
}

function getapellido(){
    return $this->apellidoEmpleado;
}

function setUsuario($usuarioEmpleado){
    $this->usuarioEmpleado = $usuarioEmpleado;
}

function getusuario(){
    return $this->usuarioEmpleado;
}

function setClave($claveEmpleado){
    $this->claveEmpleado = $claveEmpleado;
}

function getClave(){
    return $this->claveEmpleado;
}

function setTipo($tipoEmpleado){
    $this->tipoEmpleado = $tipoEmpleado;
}

function getTipo(){
    return $this->tipoEmpleado;
}

}