<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Meine Rezepte</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link rel="stylesheet" href="../style/index.css">
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark px-5">
      <div class="container-fluid">php
        <a class="navbar-brand" href="./index.php"><img src="../img/frying-pan_10647075.png"
            class="d-inline-block align-text-top me-2 index-logo" alt="Cook & Share Logo"></a>
        <div class="navbar-collapse d-flex">
          <!-- Linke Navigationsleiste -->
          <ul class="navbar-nav me-auto mb-2 mb-sm-0">
            <li class="nav-item">
              <a class="nav-link active" href="./dashboard.php">Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./favorite.php">Favoriten</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./upload.php">Upload</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./profil.php">Profil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./MRezepte.php">Meine Rezepte</a>
            </li>
          </ul>

          <!-- Rechte Seite -->
          <!--<form class="d-flex me-3" role="search">
          <input class="form-control" type="search" placeholder="Search" aria-label="Search">
        </form>-->
          <a class="nav-link" href="../pages/index.php">
            <button class="btn btn-secondary">Abmelden</button>
          </a>
        </div>
    </nav>
  </header>

  <main class="container">
    <h1 class="favoriten">Meine Rezepte</h1>
    <ul class="fav-list">
        <li class="item">
            <a href="rezept.php">
              <img
              src="../img/pizza.jpg" />
              <div class="item-detail">
                <p class="item-title">Spaghetti mit Tomaten-Basilikum</p>
                <p class="zutaten">Spaghetti, Tomaten, Basilikum, Olivenöl, Salz, Pfeffer</p>
                <p class="user">von Anna</p>
              </div>
            </a>
        </li>
        <li class="item">
            <a href="rezept.php">
              <img src="../img/pizza.jpg" />
              <div class="item-detail">
                <p class="item-title">Spaghetti mit Tomaten-Basilikum</p>
                <p class="zutaten">Spaghetti, Tomaten, Basilikum, Olivenöl, Salz, Pfeffer</p>
                <p class="user">von Anna</p>
              </div>
            </a>
        </li>
        <li class="item">
            <a href="rezept.php">
              <img src="../img/pizza.jpg" />
              <div class="item-detail">
                <p class="item-title">Spaghetti mit Tomaten-Basilikum</p>
                <p class="zutaten">Spaghetti, Tomaten, Basilikum, Olivenöl, Salz, Pfeffer</p>
                <p class="user">von Anna</p>
              </div>
            </a>
        </li>
    </ul>

  </main>

  <footer class="site-footer">
    <div class="container">
      <p>© Cook &amp; Share — Team Rath &amp; Wollinger</p>
    </div>
  </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
