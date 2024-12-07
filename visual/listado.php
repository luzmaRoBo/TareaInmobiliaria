<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarea 2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
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
                    <h2>listado de inmuebles</h2>
                    
                        <?php
                           require_once "../logica/listadoLog.php";
                        ?>
                    
                </section>
            </main>
        </div>
        <footer>
            <p>Luz María Rojas Bonachera</p>
            <p>2º daw</p>
        </footer>
    </div>
    <!-- script para confirmar si quiero eliminar el inmueble -->
    <script>
        function confirmarBorrado() {
            return confirm("¿Estás seguro de que deseas eliminar este inmueble?");
        }
    </script>
</body>
</html>
