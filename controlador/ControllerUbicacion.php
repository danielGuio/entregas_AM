<?php

require_once '../modelo/UbicacionCRUD.php';

$objUbicacionescrud = new UbicacionCRUD();

if(isset($_POST['buscarListapoblacion'])){
    $poblaBuscar = $_POST['entrada'];
    $listaUbic = array();
    $listaUbic = $objUbicacionescrud->VerUbicaciones($poblaBuscar);
    
    $listaUbicnom = array();
    
    foreach ($listaUbic as $valor){        
        array_push($listaUbicnom, $valor->getNombrePoblacion());       
    }  
    echo json_encode($listaUbicnom);
}

