<?php

class Coneccion{
    
    function conectar(){
    
            $coneccion = mysqli_connect(hostname: "localhost", username: "root", password: "", database: "db_entregasam");
            if(!$coneccion){
                die('error de coneccion: '.$coneccion->connect_errno);
            }
        return $coneccion;
    }
}
