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
                        <?php require_once "../logica/insertarLog.php";?>
                    </p>
                    <div id="formulario">
                        <!--Creo el formulario para introducir datos -->
                        <form action="insertar.php" method="post">
                            <label>Localidad</label>
                            <input type="text" name="localidad" required>
                            <label>Provincia</label>
                            <input type="text" name="provincia" required>
                            <label>Dirección</label>
                            <input type="text" name="direccion" required>
                            <label>Tipo inmueble</label>
                            <select name="tipo" require>
                                <option value="casa">casa</option>
                                <option value="piso">piso</option>
                                <option value="adosado">adosado</option>
                                <option value="chalet">chalet</option>
                                <option value="otro">otro</option>
                            </select>
                            <label>Metros cuadrados</label>
                            <input type="number" name="metros" required>
                            <label>Dormitorios</label>
                            <input type="number" name="dormitorios" required>
                            <label>Baños</label>
                            <input type="number" name="banos" required>
                            <label>Precio de venta</label>
                            <input type="number" name="precio" required>
                            <label>Foto</label>
                            <input type="text" name="foto">
                            <button type="sumbit" id="botonI">Insertar</button>
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
