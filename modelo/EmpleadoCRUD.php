<?php

include_once '../config/Coneccion.php';
class EmpleadoCRUD extends Coneccion {

    var $conn;
    var $consulta;
    var $cedula;
    var $nombre;
    var $apellido;
    var $usuario;
    var $clave;
    var $tipo;

    public function insertarEmpleado(Empleado $objEmpleado) {
        $bandera = false;
        $conn = $this->conectar();
        $this->cedula = $objEmpleado->getCedula();
        $this->nombre = $objEmpleado->getNombre();
        $this->apellido = $objEmpleado->getapellido();
        $this->usuario = $objEmpleado->getusuario();
        $this->clave = $objEmpleado->getClave();
        $this->tipo = $objEmpleado->getTipo();
        $consulta = "insert into empleado (cedulaempleado, nombreempleado, apellidoempleado, usuarioempleado, clave, tipoempleado)values(?,?,?,?,?,?)";

        $pre = mysqli_prepare($conn, $consulta);
        $pre->bind_param("isssss", $this->cedula, $this->nombre, $this->apellido, $this->usuario, $this->clave, $this->tipo);
        try{
        $pre->execute();
        $bandera = true;
        }catch (Exception $e){
            echo 'error al insertar un empleado en la base de datos: ' . $e->getMessage()." Codigo de error: ".
            mysqli_errno($conn);
        }
        return $bandera;
    }
    
    public function buscarEmpleado($cedula){
        $conn = $this->conectar();
        $consulta = "select * from empleado where cedulaempleado = ?";
        $sentencia = $conn->stmt_init();
        if(!$sentencia->prepare($consulta)){
            print "fallo la preparacion de la consulta traer empleado";
        }
        else{
            $sentencia->bind_param("s", $cedula);
            $sentencia->execute();
            $resultado = $sentencia->get_result();    
            $fila = $resultado->fetch_array(MYSQLI_NUM);           
        }
        if(mysqli_num_rows($resultado) > 0){
            $objempleado = new Empleado($fila[0], $fila[1], $fila[2], $fila[3], $fila[4], $fila[5]);
        }else{
            $objempleado = new Empleado(0, 0, 0, 0, 0, 0);
        }
        return $objempleado;
    }

    public function buscarEmpleadoLogin($usuario, $clave){
            $conn = $this->conectar();
            $consulta = "select * from empleado where usuarioempleado = ? and clave = ?";

            $sentencia = $conn->stmt_init();
            if(!$sentencia->prepare($consulta)){
                print "fallo la preparacion de la consulta traer empleado";
            }
            else{
                $sentencia->bind_param("ss", $usuario, $clave);
                $sentencia->execute();
                $resultado = $sentencia->get_result();    
                $fila = $resultado->fetch_array(MYSQLI_NUM); 
                if($fila==null){
                    $objempleado = new Empleado(0, 0, 0, 0, 0, 0);
                }else{
                    $objempleado = new Empleado($fila[0], $fila[1], $fila[2], $fila[3], $fila[4], $fila[5]);
                }
            }           
            return $objempleado;
    }
}
