<?php

include_once '../config/Coneccion.php';

class ClienteRemCRUD extends Coneccion {

    var $conn;
    var $consulta;
    var $documento;
    var $tipoDocumento;
    var $nombre;
    var $direccion;
    var $telefono;
    var $email;
    var $nomcontacto;
    var $ubicasion;

    public function insertarCliente(ClienteRem $objcliente) {
        $banderavalidar = false;
        $this->conn = $this->conectar();
        $this->documento = $objcliente->getDocumento();
        $this->tipoDocumento = $objcliente->getTipoDocumento();
        $this->nombre = $objcliente->getNombre();
        $this->direccion = $objcliente->getDireccion();
        $this->telefono = $objcliente->getTelefono();
        $this->email = $objcliente->getEmail();
        $this->nomcontacto = $objcliente->getNombrecontacto();
        $this->ubicasion = $objcliente->getUbicasion();

        $this->consulta = "insert into remitente(documento, Tipodocumento, nombreRemi,direccion, telefono, nomContacto,emai, "
                . "poblacion_idpoblacion)values(?,?,?,?,?,?,?,?)";
        $pre = mysqli_prepare($this->conn, $this->consulta);
        $pre->bind_param("sssssssi", $this->documento, $this->tipoDocumento, $this->nombre, $this->direccion, $this->telefono, $this->nomcontacto, $this->email, $this->ubicasion);

        try {
            $pre->execute();
            if ($pre->get_result()) {
                $banderavalidar = false;
                echo 'error al insertar un cliente remitente en la base de datos: ' . $e->getMessage() . " Codigo de error: " .
                mysqli_errno($this->conn);
            } else {
                $banderavalidar = true;
            }
        } catch (Exception $e) {
            echo 'error al insertar un cliente remitente en la base de datos: ' . $e->getMessage() . " Codigo de error: " .
            mysqli_errno($this->conn);
            $banderavalidar = false;
        }
        return $banderavalidar;
    }

    public function buscarclirendoc($documento) {
        $this->conn = $this->conectar();
        $consulta = "SELECT documento, Tipodocumento, nombreRemi, direccion, telefono, emai, nomContacto, nombre_poblacion
        from remitente inne JOIN poblacion on poblacion_idpoblacion = idpoblacion where documento = ?";

        $sentencia = $this->conn->stmt_init();
        if (!$sentencia->prepare($consulta)) {
            print "fallo la preparacion de la consulta traer clienteRem por documento";
        } else {
            $sentencia->bind_param("s", $documento);
            $sentencia->execute();
            $resultado = $sentencia->get_result();
            $fila = $resultado->fetch_array(MYSQLI_NUM);
            if (mysqli_num_rows($resultado) > 0) {
                $objclirem = new ClienteRem($fila[0], $fila[1], $fila[2], $fila[3], $fila[4], $fila[5], $fila[6], $fila[7]);
            } else {
                $objclirem = new ClienteRem(0, 0, 0, 0, 0, 0, 0, 0);
            }
            return $objclirem;
        }
    }

    public function buscarcliremnom($nombre) {
        $this->conn = $this->conectar();
        $consulta = "SELECT documento, Tipodocumento, nombreRemi, direccion, telefono, nomContacto, emai, nombre_poblacion
        from remitente inne JOIN poblacion on poblacion_idpoblacion = idpoblacion where nombreRemi like '%$nombre%'";
        $resultado = mysqli_query($this->conn, $consulta);
        $listaCliRem = array();
        if (mysqli_num_rows($resultado) > 0) {
            while ($row = mysqli_fetch_assoc($resultado)) {
                $objclienterem = new ClienteRem($row['documento'], $row['Tipodocumento'], $row['nombreRemi'], $row['direccion'],
                        $row['telefono'], $row['emai'], $row['nomContacto'], $row['nombre_poblacion']);
                array_push($listaCliRem, $objclienterem);
            }
        } else {
            
        }
        return $listaCliRem;
    }
    
        public function buscarcliremTodos() {
        $this->conn = $this->conectar();
        $consulta = "SELECT documento, Tipodocumento, nombreRemi, direccion, telefono, nomContacto, emai, nombre_poblacion
        from remitente inne JOIN poblacion on poblacion_idpoblacion = idpoblacion";
        $resultado = mysqli_query($this->conn, $consulta);
        $listaCliRem = array();
        if (mysqli_num_rows($resultado) > 0) {
            while ($row = mysqli_fetch_assoc($resultado)) {
                $objclienterem = new ClienteRem($row['documento'], $row['Tipodocumento'], $row['nombreRemi'], $row['direccion'],
                        $row['telefono'], $row['emai'], $row['nomContacto'], $row['nombre_poblacion']);
                array_push($listaCliRem, $objclienterem);
            }
        } else {
            
        }
        return $listaCliRem;
    }

    public function editarclienterem(ClienteRem $objcliente, $documentoinicial) {
        $this->conn = $this->conectar();
        $this->documento = $objcliente->getDocumento();
        $this->tipoDocumento = $objcliente->getTipoDocumento();
        $this->nombre = $objcliente->getNombre();
        $this->direccion = $objcliente->getDireccion();
        $this->telefono = $objcliente->getTelefono();
        $this->email = $objcliente->getEmail();
        $this->nomcontacto = $objcliente->getNombrecontacto();
        $this->ubicasion = $objcliente->getUbicasion();

        $this->consulta = "update remitente set documento = ?, Tipodocumento = ?, nombreRemi = ?, direccion = ?, telefono = ?, emai = ?, nomContacto = ?, poblacion_idpoblacion = ? WHERE documento = ?";
        $pre = mysqli_prepare($this->conn, $this->consulta);
        $pre->bind_param("sssssssss", $this->documento, $this->tipoDocumento, $this->nombre, $this->direccion, $this->telefono, $this->email, $this->nomcontacto, $this->ubicasion, $documentoinicial);

        try {
            $pre->execute();
            if ($pre->get_result()) {
                $banderavalidar = false;
                echo 'no se edito la informacion en cliente remitente';
            } else {
                $banderavalidar = true;               
            }
        } catch (Exception $e) {
            echo 'error al editar un cliente remitente en la base de datos: ' . $e->getMessage() . " Codio de error: " .
            mysqli_errno($this->conn);
            $banderavalidar = false;
        }
        return $banderavalidar;
    }

}
