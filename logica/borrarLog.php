<?php

    //verifico si envio datos por post
    if(isset($_POST['id']) && !empty($_POST['id'])){
        $idRecibido = $_POST['id'];

        //preparo la consulta
        $borrarInm = $conexion->prepare("DELETE FROM inmuebles WHERE id = ?");

        //vinculo la variable con el marcador ?
        $borrarInm->bind_param("i",$idRecibido);

        //ejecuto la consulta
        if($borrarInm->execute()){
            echo "Inmueble eliminado correctamente.";
        }else{
            echo "Error al eliminar inmueble" . $conexion->error . "<br>";
        }
        //cierro la consulta
        $borrarInm->close();
    }
    //cierro la conexion 
    $conexion->close();

    

?>