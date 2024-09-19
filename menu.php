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
        for ($i = 0; $i < 20; $i++) 
        {
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
        }
        ?> 
      </section>
    </main>
    <footer>
      <p>&copy; 2024 PopCorner. Todos los derechos reservados.</p>
    </footer>
  </body>
</html>

