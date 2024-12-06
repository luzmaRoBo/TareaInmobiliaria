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
                        <!-- llamo al documento que realiza todas las acciones de instalar-->
                        <?php require_once "../logica/borrarLog.php";?>
                    </p>
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
