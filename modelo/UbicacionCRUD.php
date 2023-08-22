<?php

include_once '../config/Coneccion.php';
include_once 'Ubicacion.php';

class UbicacionCRUD extends Coneccion {

    var $conn;
    var $idUbicacion;
    var $nombreUbicacion;

    public function VerUbicaciones($nombreUbicacion) {
        $this->conn = $this->conectar();
        $consulta = "select * FROM poblacion WHERE nombre_poblacion LIKE '%$nombreUbicacion%' ";
        $resultado = mysqli_query($this->conn, $consulta);
        $listaPoblacion = array();
        if (mysqli_num_rows($resultado) > 0) {
            while ($row = mysqli_fetch_assoc($resultado)) {
                $objUbicasion = new Ubicacion($row['idpoblacion'], $row['nombre_poblacion']);
                array_push($listaPoblacion, $objUbicasion);
            }
        } else {
            
        }
        return $listaPoblacion;
    }

    public function ubicacionNombre($nombreUbicacion) {
        $this->conn = $this->conectar();
        $consulta = "select * FROM poblacion WHERE nombre_poblacion = '$nombreUbicacion' ";
        $resultado = mysqli_query($this->conn, $consulta);
        if (mysqli_num_rows($resultado) > 0) {
            $row = mysqli_fetch_assoc($resultado);
            $objUbicasion = new Ubicacion($row['idpoblacion'], $row['nombre_poblacion']);
        } else {
            $objUbicasion = new Ubicacion(0, 0);
        }
        return $objUbicasion;
    }

}
