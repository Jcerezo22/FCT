<?php 
    if(!isset($_COOKIE["usuario"])) 
    {
        header("Location: ../index.php");
        exit;
    } 
    else 
    {
        $datosUsu = unserialize($_COOKIE["usuario"]);
        if($datosUsu["rol_id"] != 1)
        {
            header("Location: ../index.php");
            exit;
        }
    }
?>