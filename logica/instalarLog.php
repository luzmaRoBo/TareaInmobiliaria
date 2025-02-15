<?php
    /*REQUIERO LA CONEXION CON LA BASE DE DATOS COMO ROOT */
    require_once "conexionRoot.php";

    /*CREAMOS USUARIOS*/
    $usuario1 = "admin";
    $passUsuario1 = "admin";
    $usuario2 = "usuario";
    $passUsuario2 = "usuario";
    

    //borramos el usuario si ya existe
    $borrarUsuario1 = "DROP USER IF EXISTS '$usuario1@localhost'";
    //ejecutamos la consulta para borrar el usuario
    if ($conexion->query($borrarUsuario1) === TRUE) {
        echo "El usuario '$usuario1' ha sido eliminado si existía.<br>";
    } else {
        echo "Error al eliminar el usuario '$usuario1': " . $conexion->error . "<br>";
    }
    //creamos el usuario si no existe
    $crearUsuario = "CREATE USER if not exists '$usuario1'@'localhost' IDENTIFIED BY '$passUsuario1'";
    //ejecutamos la consulta para crear el usuario
    if($conexion->query($crearUsuario)=== TRUE){
        echo "El usuario '$usuario1' ha sido creado.<br>";
    }else{
        echo "El usuario '$usuario1' no se ha creado" . $conexion->error. "<br>";
    }
    //borramos el usuario si ya existe
    $borrarUsuario2 = "DROP USER IF EXISTS '$usuario2@localhost'";
    //ejecutamos la consulta para borrar el usuario
    if ($conexion->query($borrarUsuario2) === TRUE) {
        echo "El usuario '$usuario2' ha sido eliminado si existía.<br>";
    } else {
        echo "Error al eliminar el usuario '$usuario2': " . $conexion->error . "<br>";
    }
    //creamos el usuario si no existe
    $crearUsuario = "CREATE USER if not exists '$usuario2'@'localhost' IDENTIFIED BY '$passUsuario2'";
    //ejecutamos la consulta para crear el usuario
    if($conexion->query($crearUsuario)=== TRUE){
        echo "El usuario '$usuario2' ha sido creado.<br>";
    }else{
        echo "El usuario '$usuario2' no se ha creado" . $conexion->error. "<br>";
    }

    /*ASIGNAMOS PERMISOS*/
    $permisos = "GRANT ALL PRIVILEGES ON *.* TO '$usuario1'@'localhost'";
    //ejecutamos la consulta para otorgar permisos
    if($conexion->query($permisos)=== TRUE){
        echo "El usuario tiene permisos otorgados.<br>";
    }else{
        echo "Han fallado los permisos." . $conexion->error. "<br>";
    }
    
    $permisos = "GRANT SELECT ON *.* TO '$usuario2'@'localhost'";
    //ejecutamos la consulta para otorgar permisos
    if($conexion->query($permisos)=== TRUE){
        echo "El usuario tiene permisos otorgados.<br>";
    }else{
        echo "Han fallado los permisos." . $conexion->error. "<br>";
    }

    /*CREAMOS LA BASE DE DATOS Y CERRAMOS LA CONEXION*/
    $bd = "inmobiliaria";
    //borramos la base de datos si ya existe
    $borrarBD = "DROP DATABASE IF EXISTS $bd";
    //ejecutamos la consulta para borrar la tabla
    if($conexion->query($borrarBD)===TRUE){
        echo "La base de datos '$bd' ha sido borrada. <br>";
    }else{
        echo "Error al eliminar la base de datos '$bd': " . $conexion->error . "<br>";
    }
    //creamos la base de datos si no existe
    $crearBD = "CREATE DATABASE IF NOT EXISTS $bd";
    //ejecutamos la consulta para crear la base de datos
    if($conexion->query($crearBD)===TRUE){
        echo "Base de datos '$bd' creada correctamente<br>";
    }else{
        echo "Error creando la base de datos '$bd'" . $conexion->error  . "<br>";
    }

    $conexion->close();

    /*CONECTAMOS CON LA NUEVA BASE DE DATOS Y USUARIO ADMIN*/
    require_once "conexionBD.php";

    /*CREAMOS LA TABLA*/
    //borramos la tabla si ya existe
    $borrarTabla = "DROP TABLE IF EXISTS inmuebles";
                            //ejecutamos la consulta para borrar la tabla
                            if ($conexion->query($borrarTabla) === TRUE) {
                                echo "La tabla 'inmuebles' ha sido eliminada si existía.<br>";
                            } else {
                                echo "Error al eliminar la tabla 'inmuebles': " . $conexion->error . "<br>";
                            }
                            //creamos la tabla si no existe definiendo cada columna de la tabla
                            $crearTabla = "CREATE TABLE IF NOT EXISTS inmuebles(
                            id INT AUTO_INCREMENT PRIMARY KEY,
                            localidad VARCHAR(100) NOT NULL,
                            provincia VARCHAR(100) NOT NULL,
                            direccion VARCHAR(255) NOT NULL,
                            tipo ENUM('casa', 'piso', 'adosado', 'chalet', 'otro') NOT NULL,
                            metros_cuadrados INT NOT NULL,
                            dormitorios INT NOT NULL,
                            banos INT NOT NULL,
                            precio_venta DECIMAL(10,2) NOT NULL,
                            foto VARCHAR(255) NOT NULL
                            )";
                            //ejecutamos las consulta para crear la tabla
                            if ($conexion->query($crearTabla) === TRUE) {
                                echo "Tabla 'inmuebles' creada correctamente<br>";
                            } else {
                                echo "Error al crear la tabla: " . $conexion->error;
                            }

    /*INSERTAMOS REGISTROS EN LA TABLA Y CERRAMOS LA CONEXION*/
    //creamos la consulta preparada para evitar la insercion de codigo
    $insertarR = $conexion->prepare
    ("INSERT INTO inmuebles (localidad, provincia, direccion, tipo, metros_cuadrados, dormitorios, banos, precio_venta, foto)
    VALUES (?,?,?,?,?,?,?,?,?)");
    //vinculamos las variables con los marcadores ? especificando el tipo de dato
    $insertarR->bind_param
    ("ssssiiids", $localidad, $provincia, $direccion, $tipo, $metros, $dormitorios, $banos, $precio, $foto);

    /*PARAMETROS A INSERTAR*/
    //array donde cada linea es un sub array con los valores a introducir en un registro
    $registros = [
        ["Madrid", "Madrid", "Calle Mayor 10", "piso", 100, 3, 2, 250000.00, "../img/img1.jpeg"],
        ["Barcelona", "Barcelona", "Avenida Diagonal 50", "piso", 80, 2, 1, 200000.00, "../img/img2.jpeg"],
        ["Valencia", "Valencia", "Plaza del Ayuntamiento 5", "casa", 150, 4, 3, 300000.00, "../img/img3.jpeg"],
        ["Sevilla", "Sevilla", "Calle Sierpes 12", "adosado", 120, 3, 2, 220000.00, "../img/img4.jpeg"],
        ["Bilbao", "Vizcaya", "Gran Vía 18", "piso", 90, 3, 2, 240000.00, "../img/img5.jpeg"],
        ["Málaga", "Málaga", "Paseo Marítimo 30", "casa", 200, 5, 4, 400000.00, "../img/img6.jpeg"],
        ["Zaragoza", "Zaragoza", "Calle Alfonso 22", "piso", 75, 2, 1, 180000.00, "../img/img7.jpeg"],
        ["Granada", "Granada", "Calle Elvira 8", "adosado", 110, 3, 2, 210000.00, "../img/img8.jpeg"],
        ["Santander", "Cantabria", "Calle Burgos 15", "piso", 85, 3, 2, 190000.00, "../img/img2.jpeg"],
        ["Alicante", "Alicante", "Avenida Maisonnave 25", "casa", 180, 4, 3, 350000.00, "../img/img10.jpeg"]
    ];

    //recorremos cada subarray $registro dentro del array $registros
    foreach ($registros as $registro) {
        //asignamos el valor de la variable correspondiente a cada posicion del subarray
        [$localidad, $provincia, $direccion, $tipo, $metros, $dormitorios, $banos, $precio, $foto] = $registro;
        //ejecutamos la consulta con los valores de cada variable
        if ($insertarR->execute()) {
            echo "Registro insertado correctamente<br>";
        } else {
            echo "Error al insertar el registro: " . $insertarR->error . "<br>";
        }
    }

    //cerramos la consulta y cerramos la conexion
    $insertarR->close();
    $conexion->close();
?>