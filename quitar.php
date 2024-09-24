<?php
// Iniciar sesión o incluir lógica de autenticación si es necesario
// Asegúrate de proteger esta página para que solo usuarios autenticados puedan acceder

// Configuración de conexión a la base de datos
$servidor = 'localhost';
$database = 'popcorner';
$usuario = 'root';
$pass = '';

// Conectar a la base de datos
$con = mysqli_connect($servidor, $usuario, $pass, $database);

// Verificar conexión
if (!$con) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Inicializar mensaje
$mensaje = "";

// Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escapar caracteres especiales para evitar inyección SQL
    $nombre = mysqli_real_escape_string($con, $_POST['nombre']);

    // Consulta SQL para eliminar la película por nombre
    $sql = "DELETE FROM peliculas WHERE nombre = ?";

    // Preparar y ejecutar la consulta con sentencias preparadas
    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $nombre);

    if ($stmt->execute()) {
        if ($stmt->affected_rows > 0) {
            $mensaje = "<p style='color: green; background-color: white; border-radius: 20px; padding: 10px; font-size: large;'>Película eliminada exitosamente.</p>";
        } else {
            $mensaje = "<p style='color: red; background-color: white; border-radius: 20px; padding: 10px; font-size: large;'>No se encontró ninguna película con ese nombre.</p>";
        }
    } else {
        $mensaje = "<p style='color: red; background-color: white; border-radius: 20px; padding: 10px; font-size: large;'>Error al eliminar la película: " . $stmt->error . "</p>";
    }

    // Cerrar la sentencia
    $stmt->close();
}

// Cerrar la conexión a la base de datos al final del script
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quitar Película - PopCorner</title>
    <!-- Importar el archivo de estilos principal -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="background-overlay"></div>
    <header>
        <h1>PopCorner</h1>
        <nav class="navbar">
            <ul>
                <li><a href="menu2.php">Menú</a></li>
                <li><a href="agregar.php">Agregar</a></li>
                <li><a href="quitar.php">Quitar</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <?php
        // Mostrar mensaje si existe
        if (!empty($mensaje)) {
            echo "<div class='message-container'>$mensaje</div>";
        }
        ?>
        <div class="remove-movie-container">
            <h2>Quitar Película</h2>
            <form action="quitar.php" method="POST">
                <input type="text" name="nombre" placeholder="Nombre de la película" required>
                <button type="submit">Eliminar Película</button>
            </form>
        </div>
    </main>
    <footer>
        <p>&copy; 2024 PopCorner. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
<?php
// Cerrar la conexión a la base de datos
$con->close();
?>
