<?php
// Configuración de conexión a la base de datos
$servidor = 'localhost';
$database = 'popcorner';
$usuario = 'root';
$pass = '';

// Conectar a la base de datos
$con = mysqli_connect($servidor, $usuario, $pass, $database);

// Consulta para verificar el usuario
$sql = "SELECT * FROM usuarios";
$result = $con->query($sql);
?>

<?php
if ($result->num_rows > 0) {
    // Si el usuario está autenticado
    while ($row = $result->fetch_assoc()) {
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>PopCorner</title>
            <meta charset="UTF-8"/>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="style.css"/>
        </head>
        <body>
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
            // Mostrar el nombre del usuario autenticado
            echo "<h2>Bienvenido(a) " . $row['nombre'] . "</h2>";
            ?>
            <section class="search-and-buttons-container">
                <div class="search-bar">
                    <input type="text" placeholder="Buscar">
                    <button>Buscar</button>
                </div>
                <div class="buttons-wrapper">
                    <button class="filter-button">Sci-fi</button>
                    <button class="filter-button">Adventure</button>
                    <button class="filter-button">Fantasy</button>
                    <button class="filter-button">Drama</button>
                </div>
            </section>
            <section class="movies-container">
                <?php
                // Consulta para seleccionar todas las películas
                $sql2 = "SELECT * FROM peliculas";
                $result2 = $con->query($sql2);

                // Verifica si hay resultados y los muestra
                if ($result2->num_rows > 0) {
                    while ($row2 = $result2->fetch_assoc()) {
                        ?>
                        <article class="movie-item">
                            <div class="image-wrapper">
                                <!-- Mostrar la imagen de la película -->
                                <img src="<?php echo $row2['imagen']; ?>" alt="Imagen de <?php echo $row2['nombre']; ?>"/>
                            </div>
                            <div class="content">
                                <!-- Mostrar el nombre de la película -->
                                <h4><?php echo $row2['nombre']; ?></h4>
                                <div class="movie-info">
                                    <div class="score-wrapper">
                                        <img src="./assets/star.svg" alt="Ícono de una estrella"/>
                                        <!-- Mostrar el puntaje de la película -->
                                        <p class="score"><?php echo $row2['puntaje']; ?>/10</p>
                                    </div>
                                    <!-- Mostrar el género de la película -->
                                    <span class="genre"><?php echo $row2['genero']; ?></span>
                                </div>
                                <!-- Mostrar la descripción de la película -->
                                <p class="plot">
                                    <?php echo $row2['descripcion']; ?>
                                    <form action="quitar.php" method = "POST" class = "remove-movie-container2">
                                        <INput type = "hidden" name = "nombre" value = "<?php echo $row2['nombre']; ?>"></INput>
                                        <button type="submit">Eliminar Película</button>
                                    </form>
                                </p>
                            </div>
                        </article>
                        <?php
                    }
                } else {
                    // Mensaje si no hay películas en la base de datos
                    echo "<p>No hay películas disponibles en este momento.</p>";
                }
                ?>
            </section>
        </main>
        <footer>
            <p>&copy; 2024 PopCorner. Todos los derechos reservados.</p>
        </footer>
        </body>
        </html>
        <?php
    }
} 
$con->close();
?>
