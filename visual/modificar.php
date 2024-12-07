<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarea 2</title>
    <link rel="stylesheet" type="text/css" href="../css/estilos.css">
</head>
<body>
    <div>
        <header>
            <div>
                <img src="../img/logo.webp">
            </div>
            <div>
                <h1>Tarea 2: dw entorno servidor </h1>
            </div>
        </header>
        <div>
            <nav>
                <ul>
                    <li><a href="instalar.php">Instalar</a></li>
                    <li><a href="listado.php">Listar</a></li>
                    <li><a href="insertar.php">Insertar</a></li>
                    <li><a href="../index.php">Inicio</a></li>
                </ul>
            </nav>
            <main>
                <section id="resultados">
                    <p>
                        <!-- hago la conexion con la base de datos-->
                        <?php require_once "../logica/conexionBD.php";?>
                    </p>
                </section>
                <section id="resultados">
                    <p>
                        <!-- llamo al documento que realiza todas las acciones de instalar-->
                        <?php require_once "../logica/modificarLog.php";?>
                    </p>
                    <div id="formulario">
                        <form action="modificar.php" method="post">
                            <!--  campo oculto para recibir id y mostrar datos en el formulario-->
                            <input type="hidden" name="id" value="<?php echo $inmueble['id']; ?>">
                            <!--  campo oculto para recibir id y actualizar en la base de datos-->
                            <input type="hidden" name="idAct" value="<?php echo $inmueble['id']; ?>">
                            <label>Localidad</label>
                            <input type="text" name="localidad" value="<?php echo $inmueble['localidad']; ?>"  required>
                            <label>Provincia</label>
                            <input type="text" name="provincia" value="<?php echo $inmueble['provincia']; ?>" required>
                            <label>Dirección</label>
                            <input type="text" name="direccion" value="<?php echo $inmueble['direccion']; ?>" required>
                            <label>Tipo inmueble</label>
                            <select name="tipo" require>
                                <option value="casa" <?php if ($inmueble['tipo'] == 'casa') echo 'selected'; ?>>casa</option>
                                <option value="piso" <?php if ($inmueble['tipo'] == 'piso') echo 'selected'; ?>>piso</option>
                                <option value="adosado" <?php if ($inmueble['tipo'] == 'adosado') echo 'selected'; ?>>adosado</option>
                                <option value="chalet" <?php if ($inmueble['tipo'] == 'chalet') echo 'selected'; ?>>chalet</option>
                                <option value="otro" <?php if ($inmueble['tipo'] == 'otro') echo 'selected'; ?>>otro</option>
                            </select>
                            <label>Metros cuadrados</label>
                            <input type="number" name="metros" value="<?php echo $inmueble['metros_cuadrados']; ?>" required>
                            <label>Dormitorios</label>
                            <input type="number" name="dormitorios" value="<?php echo $inmueble['dormitorios']; ?>" required>
                            <label>Baños</label>
                            <input type="number" name="banos" value="<?php echo $inmueble['banos']; ?>" required>
                            <label>Precio de venta</label>
                            <input type="number" name="precio" value="<?php echo $inmueble['precio_venta']; ?>" required>
                            <label>Foto</label>
                            <input type="text" name="foto" value="<?php echo $inmueble['foto']; ?>">
                            <button type="sumbit" id="botonI">Modificar</button>
                        </form>
                    </div>
                </section>
            </main>
        </div>
        <footer>
            <p>Luz María Rojas Bonachera</p>
            <p>2º daw</p>
        </footer>
    </div>
</body>
</html>
