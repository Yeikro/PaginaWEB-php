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
    $imagen = $_POST['imagen'];
    $nombre = $_POST['nombre'];
    $puntaje = $_POST['puntaje'];
    $genero = $_POST['genero'];
    $descripcion = $_POST['descripcion'];

    // Validar puntaje
    if ($puntaje < 1 || $puntaje > 10) {
        $mensaje = "<p style='color: red; background-color: white; border-radius: 20px; padding: 10px; font-size: large;'>El puntaje debe estar entre 1 y 10.</p>";
    } else {
        // Preparar la sentencia SQL
        $stmt = $con->prepare("INSERT INTO peliculas (imagen, nombre, puntaje, genero, descripcion) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssiss", $imagen, $nombre, $puntaje, $genero, $descripcion);

        if ($stmt->execute()) {
            $mensaje = "<p style='color: green; background-color: white; border-radius: 20px; padding: 10px; font-size: large;'>Película agregada exitosamente.</p>";
        } else {
            $mensaje = "<p style='color: red; background-color: white; border-radius: 20px; padding: 10px; font-size: large;'>Error al agregar la película: " . $stmt->error . "</p>";
        }

        // Cerrar la sentencia
        $stmt->close();
    }
}

// Cerrar la conexión a la base de datos al final del script
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Película - PopCorner</title>
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
        <div class="add-movie-container">
            <h2>Agregar Nueva Película</h2>
            <form action="agregar.php" method="POST">
                <input type="text" name="imagen" placeholder="URL de la imagen" required>
                <input type="text" name="nombre" placeholder="Nombre de la película" required>
                <input type="number" name="puntaje" placeholder="Puntaje (1-10)" min="1.0f" max="10.0f" required>
                <input type="text" name="genero" placeholder="Género" required>
                <textarea name="descripcion" placeholder="Descripción de la película" rows="4" required></textarea>
                <button type="submit">Agregar Película</button>
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
