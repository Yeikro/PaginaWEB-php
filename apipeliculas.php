<?php
  $servidor = 'localhost';
  $database = 'popcorner';
  $usuario = 'root';
  $pass = '';

  // Conectar a la base de datos
  $con = mysqli_connect($servidor, $usuario, $pass, $database);
  // Check connection
  if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
  }

  $sql = "SELECT * FROM peliculas";
  $result = $con->query($sql);

  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo "[pelicula]\n";
      echo "id_pelicula  = ".$row['id_pelicula']."\n";
      echo "imagen = ".$row['imagen']."\n";
      echo "nombre = ".$row['nombre']."\n";
      echo "puntaje = ".$row['puntaje']."\n";
      echo "genero = ".$row['genero']."\n";
      echo "descripcion = ".$row['descripcion']."\n\n";
    }
  } else {
      echo "[usuarios]\n";
      echo "id_pelicula  = n/a\n";
      echo "imagen = n/a\n";
      echo "nombre = n/a\n";
      echo "puntaje = n/a\n";
      echo "genero = n/a\n";
      echo "descripcion = n/a\n\n";
  }
  $con->close();
?>