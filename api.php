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

  $buscaruser = $_GET['id'];
  $sql = "SELECT * FROM usuarios WHERE id = $buscaruser";
  $result = $con->query($sql);

  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo "[usuarios]\n";
      echo "id  = ".$row['id']."\n";
      echo "nombre = ".$row['nombre']."\n";
      echo "usuario = ".$row['usuario']."\n";
      echo "pass = ".$row['pass']."\n";
      echo "email = ".$row['email']."\n\n";
    }
  } else {
      echo "[usuarios]\n";
      echo "id  = n/a\n";
      echo "nombre = n/a\n";
      echo "usuario = n/a\n";
      echo "pass = n/a\n";
      echo "email = n/a\n\n";
  }
  $con->close();
?>