<?php
    //verifico si enviamos datos por post
    if($_SERVER["REQUEST_METHOD"]=== "POST"){
        //si hay envío recojo los datos enviados por post, evito la introduccion de caracteres especiales
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

        //creamos la consulta preparada para evitar la insercion de codigo
        $insertarR = $conexion->prepare
        ("INSERT INTO inmuebles (localidad, provincia, direccion, tipo, metros_cuadrados, dormitorios, banos, precio_venta, foto)
        VALUES (?,?,?,?,?,?,?,?,?)");
        //vinculamos las variables con los marcadores ? especificando el tipo de dato
        $insertarR->bind_param
        ("ssssiiids", $localidad, $provincia, $direccion, $tipo, $metros, $dormitorios, $banos, $precio, $foto);

        //ejecutamos la consulta con los valores de cada variable
        if ($insertarR->execute()) {
            echo "Registro insertado correctamente<br>";
        } else {
            echo "Error al insertar el registro: " . $insertarR->error . "<br>";
        }
        //cierro la consulta preparada
        $insertarR->close();

    }
    //cierro la conexion con la base de datos
    $conexion->close();
?>