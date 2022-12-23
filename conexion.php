<?php

    $host = "localhost";
    //$name = "root";
    //$pass = "Asiste.2021";
    //$database = "kapitano";

    $name = "u917903720_kapi";
    $pass = "Kapitan01*";
    $database = "u917903720_kapi";
    
    error_reporting(1);

    $conexion = new mysqli($host, $name, $pass, $database);

    if ($conexion->errno){
        echo "No se puede conectar a la base";
        exit();
    }
?>
