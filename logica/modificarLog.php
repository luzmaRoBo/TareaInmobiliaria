<?php

    //PRIMERO COJEMOS LOS DATOS DEL INMUEBLE PARA MOSTRARLOS EN EL FORMULARIO
    //verifico que envío el id del inmueble
    if(isset($_POST["id"]) && !empty($_POST["id"])){
        //almaceno el id recibido por post
        $idRecibido = $_POST["id"];

        //preparo la consulta
        $consulta = $conexion->prepare("SELECT * FROM inmuebles WHERE id = ?");
        $consulta->bind_param("i",$idRecibido);
        //si se ejecuta la consulta
        if ($consulta->execute()) {
            //Obtener el resultado
            $resultado = $consulta->get_result();
        }
        //si el resultaqdo tiene mas de 0 lineas
        if($resultado->num_rows > 0){
            //almaceno cada linea en inmueble
            $inmueble = $resultado->fetch_assoc();
        }else{
            echo "No se ha encontrado ningun inmueble";
        }

    }else{
        echo "No has enviado nada por post";
    }

    //DESPUES MODIFICAMOS LOS DATOS QUE QUERAMOS Y ACTUALIZAMOS EL INMUEBLE
    //verifico que envío los datos nuevos del inmueble
    if(isset($_POST["idAct"]) && !empty($_POST["idAct"])){

        //recojo los datos enviados por post,convirtiendo caracteres especiales
        $id = $_POST["idAct"];
        $localidad = htmlspecialchars($_POST['localidad']);
        $provincia = htmlspecialchars($_POST['provincia']);
        $direccion = htmlspecialchars($_POST['direccion']);
        $tipo = $_POST['tipo'];
        $metros = $_POST['metros'];
        $dormitorios = $_POST['dormitorios'];
        $banos = $_POST['banos'];
        $precio = $_POST['precio'];
        $foto = htmlspecialchars($_POST['foto']);

        //validacion de datos numericos para que sean numeros positivos
        if($_POST['metros']<=0 || $_POST['dormitorios']<=0 || $_POST['banos']<=0 || $_POST['precio']<=0){
            die("Los metros, dormitorios, baños y precio deben ser un numero positivo");
        }

        //preparo la consulta para evitar inyeccion de codigo
        $actualizar = $conexion->prepare ("UPDATE inmuebles SET localidad = ?,
                                            provincia = ?,
                                            direccion = ?,
                                            tipo = ?,
                                            metros_cuadrados = ?,
                                            dormitorios = ?,
                                            banos = ?,
                                            precio_venta = ?,
                                            foto = ?
                                            WHERE id = ?");

        //vinculamos las variables con los marcadores ? especificando el tipo de dato
        $actualizar->bind_param
        ("ssssiiidsi", $localidad, $provincia, $direccion, $tipo, $metros, $dormitorios, $banos, $precio, $foto, $id);

        //ejecutamos la consulta con los valores de cada variable
        if ($actualizar->execute()) {
            echo "Registro insertado correctamente<br>";
        } else {
            echo "Error al insertar el registro: " . $actualizar->error . "<br>";
        }
        //cierro la consulta preparada
        $actualizar->close();

    }

    //cierro la conexion con la base de datos
    $conexion->close();

?>