<?php

    /*CREAMOS LA CONEXION CON MYSQL*/
    $servername = "localhost";
    $user = "root";
    $pass = "";
    
    $conexion = new mysqli($servername,$user,$pass);
    
    if($conexion ->connect_error){
        die("Conexion fallida: " . $conexion->connect_error);
    }else{
        echo "La conexión root con la BD se ha establecido<br>";
    }
?>