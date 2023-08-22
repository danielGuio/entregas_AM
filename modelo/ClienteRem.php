<?php

class ClienteRem{
    private $documento;
    private $tipoDocumento;
    private $nombre;
    private $direccion;
    private $telefono;
    private $email;
    private $nomcontacto;
    private $ubicasion;

    function __construct($documento, $tipoDocumento, $nombre, $direccion, $telefono, $email, $nombrecontacto, $ubicasion) {
        $this->documento = $documento;
        $this->tipoDocumento = $tipoDocumento;
        $this->nombre = $nombre;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
        $this->email = $email;
        $this->nomcontacto = $nombrecontacto;
        $this->ubicasion = $ubicasion;
    }
    
    function setDocuento($documento){
        $this->documento = $documento;
    }
    
    function getDocumento(){
        return $this->documento;
    }
    
    function setTipoDocumento($tipoDocumento){
        $this->tipoDocumento = $tipoDocumento;
    }
    
    function getTipoDocumento(){
        return $this->tipoDocumento;
    }
    
    function setNombre($nombre){
        $this->nombre = $nombre;
    }
    
    function getNombre(){
        return $this->nombre;
    }
    
    function setDireccion($direccion){
        $this->direccion = $direccion;
    }
    
    function getDireccion(){
        return $this->direccion;
    }
    
    function setTelefono($telefono){
        $this->telefono = $telefono;
    }
    
    function getTelefono(){
        return $this->telefono;
    }
    
    function setEmail($email){
        $this->email = $email;
    }
    
    function getEmail(){
        return $this->email;
    }
    
    function setNombrecontacto($nombrecontacto){
        $this->nomcontacto = $nombrecontacto;
    }
    
    function getNombrecontacto(){
        return $this->nomcontacto;
    }
    
    function setUbicasion($ubicasion){
        $this->ubicasion = $ubicasion;
    }
    
    function getUbicasion(){
        return $this->ubicasion;
    }
    
}



