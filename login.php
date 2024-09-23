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

