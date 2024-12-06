<?php
    //hago la consulta para el lista
    $consulta = "SELECT * FROM inmuebles";
    //ejecuto la consulta del listado
    $listado = $conexion->query($consulta);

    //verifico si hay resultado y con echo digo que quieo mostar
    if($listado->num_rows > 0){
        echo "<table class='table table-hover table-bordered table-sm'>";
        echo "<thead>";
        echo "<tr class='table-primary'>
                    <th>ID</th>
                    <th>Localidad</th>
                    <th>Provincia</th>
                    <th>Dirección</th>
                    <th>Tipo</th>
                    <th>Metros Cuadrados</th>
                    <th>Dormitorios</th>
                    <th>Baños</th>
                    <th>Precio de Venta</th>
                    <th>Foto</th>
                    <th>Modificar</th>
                    <th>Borrar</th>
                </tr>";
        echo "</thead>";
        echo "<tbody>";
        //cojo cada fila de $listado y la convierto en un array asociativo
        //recorro $listado mientras tenga filas y digo con echo como mostrar los datos
        while($fila = $listado->fetch_assoc()){
            echo "<tr>";
            echo "<td>" . $fila['id'] . "</td>";
            echo "<td>" . htmlspecialchars($fila['localidad']) . "</td>";
            echo "<td>" . htmlspecialchars($fila['provincia']) . "</td>";
            echo "<td>" . htmlspecialchars($fila['direccion']) . "</td>";
            echo "<td>" . $fila['tipo'] . "</td>";
            echo "<td>" . $fila['metros_cuadrados'] . "</td>";
            echo "<td>" . $fila['dormitorios'] . "</td>";
            echo "<td>" . $fila['banos'] . "</td>";
            echo "<td>" . number_format($fila['precio_venta'], 2) . "</td>";
            echo "<td><img class='img-thumbnail' src='" . htmlspecialchars($fila['foto']) . "' alt='Foto del inmueble'></td>";
            echo "<td> 
                     <form action='modificar.php' method='POST' style='display: inline;'>
                        <input type='hidden' name='id' value='" . $fila['id'] . "'>
                        <button type='submit' class='btn btn-primary btn-sm' style='width: 36px; padding: 5px;'>
                            <i class='bi bi-pencil'></i>
                        </button>
                    </form>   
                </td>";
            echo "<td> 
                     <form action='borrar.php' method='POST' style='display: inline;'>
                        <input type='hidden' name='id' value='" . $fila['id'] . "'>
                        <button type='submit' class='btn btn-danger btn-sm' style='width: 36px; padding: 5px;'>
                            <i class='bi bi-trash'></i>
                        </button>
                    </form> 
                </td>";
            echo "</tr>";
        }
            echo "</tbody>";
            echo "</table>";

    }else{
        echo "No se encontraron datos en la tabla inmuebles";
        
    }

    //cierro la conexion 
    $conexion->close();
    
?>