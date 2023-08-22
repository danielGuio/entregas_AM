<?php

session_start();
if (isset($_SESSION['usuario'])){
    session_destroy();
    echo "<script>alert('Secion cerrada correctamente')</script>";
    echo "<script>window.location = '../index.php'</script>";
}else{
    echo "<script>alert('No tiene permiso para acceder a esta pagina')</script>";
    die();  
}
