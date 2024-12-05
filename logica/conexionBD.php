<?php

    /*CONECTAMOS CON LA BASE DE DATOS Y CREAMOS LA TABLA*/
    $servername = "localhost";
    $user = "admin";
    $pass = "admin";
    $bd = "inmobiliaria";
    
    $conexion = new mysqli($servername,$user,$pass,$bd);
    
    if($conexion ->connect_error){
        die("Conexion fallida: " . $conexion->connect_error);
    }else{
        echo "La conexión con la base de datos '$bd' se ha establecido.<br>";
    }

?>