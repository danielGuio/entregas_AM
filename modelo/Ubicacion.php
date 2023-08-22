<?php

class Ubicacion {

    private $idPoblacion;
    private $nombrePoblacion;

    function __construct($idPoblacion, $nombrePoblacion) {
        $this->idPoblacion = $idPoblacion;
        $this->nombrePoblacion = $nombrePoblacion;
    }

    public function setIdPoblacion($idPoblacion) {
        $this->idPoblacion = $idPoblacion;
    }

    public function getIdPoblacion() {
        return $this->idPoblacion;
    }

    public function setNombrePoblacion($nombrePoblacion) {
        $this->nombrePoblacion = $nombrePoblacion;
    }

    public function getNombrePoblacion() {
        return $this->nombrePoblacion;
    }

}
