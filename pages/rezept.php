<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Rezept—[Pizza]</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="../style/index.css" />
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
              <a class="nav-link active" href="./dashboard.html">Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./favorite.html">Favoriten</a>
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
          <a class="nav-link" href="../pages/login.php">
            <button class="btn btn-secondary">Login/Registrieren</button>
          </a>
        </div>
    </nav>
  </header>

    <main class="container contents">
        <div class="recipe-main">
          <img class="card-img-top mb-5"
            src="../img/pizza.jpg"
            alt="Pizza Margherita"
          />
          <div class="recipe-meta shadow p-3 mb-5  bg-body rounded">
            <h1 class="mb-3">Pizza Margherita</h1>
            <p>von Anna • 4 Zutaten • 20 min</p>
            <div class="actions">
              <button class="favorit">☆ Favorit</button>
            </div>
          </div>
        </div>

        <section class="row">
          <div class="zutaten col mb-5 shadow p-3 me-5 bg-body rounded">
            <h2>Zutaten</h2>
            <ul>
              <li>400 g Spaghetti</li>
              <li>400 g Tomaten</li>
              <li>1 Bund Basilikum</li>
              <li>Olivenöl, Salz, Pfeffer</li>
            </ul>
          </div>

          <div class="anleitung col mb-5 shadow p-3 bg-body rounded">
            <h2>Anleitung</h2>
            <ol>
              <li>Spaghetti al dente kochen.</li>
              <li>Tomaten würfeln, mit Olivenöl anbraten.</li>
              <li>Basilikum untermischen, abschmecken und servieren.</li>
            </ol>
          </div>
        </section>

        <section class="comment shadow p-3 bg-body rounded">
          <h2>Kommentare</h2>
          <div class="comment">
            <p class="comment-meta"><strong>Lisa</strong> • 2 Tage</p>
            <p>Sehr lecker! Habe noch Oliven hinzugefügt.</p>
          </div>


    <div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Deine Kommentare</label>
  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
</div>
<input class="btn btn-primary" type="submit" value="Submit">


          <!-- <form class="comment-form" aria-label="Kommentar hinzufügen">
            <textarea
              placeholder="Deinen Kommentar schreiben..."
              rows="3"
            ></textarea>
            <button>Kommentieren</button>
          </form> -->
        </section>
    </main>

    <footer class="site-footer">
    <div class="container">
      <p>© Cook &amp; Share — Team Rath &amp; Wollinger</p>
    </div>
  </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
