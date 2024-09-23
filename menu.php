<?php
  $usser = $_POST['username'];
  $password = $_POST['password'];

  $servidor = 'localhost';
  $database = 'popcorner';
  $usuario = 'root';
  $pass = '';

  $con = mysqli_connect($servidor, $usuario, $pass, $database);

  $sql = "SELECT * FROM usuarios WHERE usuario = '$usser' AND  pass = '$password'";
  $result = $con->query($sql);
?>

<?php
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      ?>
        <!DOCTYPE html>
        <html>
          <head>
            <title>PopCorner</title>
            <meta charset="UTF-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="style.css" />
          </head>

          <body>
            <header>
              <h1>PopCorner</h1>
              <nav class="navbar">
                <ul>
                  <li><a href="#">Menú</a></li>
                  <li><a href="#">Agregar</a></li>
                  <li><a href="#">Quitar</a></li>
                </ul>
              </nav>
            </header>
            <main>
              <?php
                echo "<h2>Bienbenido(a) ".$row['nombre']."</h2>";
              ?>
              <section class="search-and-buttons-container">
                <div class="search-bar">
                  <input type="text" placeholder="Search">
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
                /* $sql2 = "SELECT * FROM peliculas";
                $result2 = $con->query($sql2);

                if ($result2->num_rows > 0) {
                  // output data of each row
                  while($row2 = $result->fetch_assoc()) {
                    echo "<h2>link imagen: ".$row2['genero']."<h2>";       */   
                ?>
                  <article class="movie-item">
                    <div class="image-wrapper">
                      <img
                        src="https://images-na.ssl-images-amazon.com/images/M/MV5BNzM2MDk3MTcyMV5BMl5BanBnXkFtZTcwNjg0MTUzNA@@._V1_SX1777_CR0,0,1777,999_AL_.jpg"
                        alt="Movie Thumbnail"
                      />
                    </div>
                    <div class="content">
                      <h4>Avatar</h4>
                      <div class="movie-info">
                        <div class="score-wrapper">
                          <img src="./assets/star.svg" alt="Ícono de una estrella" />
                          <p class="score">9.0/10</p>
                        </div>
                        <span class="genre">Suspend</span>
                      </div>
                      <p class="plot">
                        A paraplegic marine dispatched to the moon Pandora on a unique
                        mission becomes torn between following his orders and protecting
                        the world he feels is his home.
                      </p>
                    </div>
                  </article>
                <?php
                  /*}
                }*/
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
  } else {
    ?>
      <!DOCTYPE html>
      <html lang="es">
      <head>
          <meta charset="UTF-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <title>Popcorner - Películas</title>
          <link rel="stylesheet" href="style.css">
      </head>
      <body>
          <div class="background-overlay"></div>
          <header>
              <h1>PopCorner</h1>
          </header>
      
          <main>
              <div class="login-container">
                  <h2>Inicia sesión o regístrate</h2>
                  <h4 Class="error">Usuario o contraseña incorrecta</h4>
                  <form action="menu.php" method="post">
                      <input type="text" name="username" placeholder="Nombre de usuario" required>
                      <input type="password" name="password" placeholder="Contraseña" required>
                      <div class="button-container">
                          <button type="submit">Iniciar Sesión</button>
                      </div>
                  </form>
              </div>
          </main>
          <footer>
              <p>&copy; 2024 Popcorner. Todos los derechos reservados.</p>
          </footer>
      </body>
      </html>
    <?php
  }
  $con->close();
?>



