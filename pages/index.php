<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cook & Share</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link rel="stylesheet" href="../style/index.css">
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark px-5">
      <div class="container-fluid">
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
          <a class="nav-link" href="../pages/login.php">
            <button class="btn btn-secondary">Login/Registrieren</button>
          </a>
        </div>
    </nav>
  </header>


  <main>
    <div class="container-fluid text-center">
      <div class="row text-center align-items-center" style="height: 250px;">
        <h2 class="col">Willkommen auf <span></span><em><strong>Cook & Share</strong></em>!</h2>
      </div>
    </div>
    <div class="container mb-3">
      <div class="dropdown col">
        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
          Kategorie
        </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="#">Vorspeise</a></li>
          <li><a class="dropdown-item" href="#">Hauptspeise</a></li>
          <li><a class="dropdown-item" href="#">Nachspeise</a></li>
        </ul>
      </div>

      <form class="d-flex me-3" role="search">
        <input class="form-control" type="search" placeholder="Pizza..." aria-label="Search">
        <button class="btn btn-secondary">search</button>
      </form>

    </div>


    <div class="container text-center contents">
      <div class="row mb-5">
        <div class="col-12 col-lg-4 card recipe" >
          <a href="rezept.php">
            <img src="../img/pizza.jpg" class="card-img-top">
            <div class="card-body">
              <p class="card-text ">Pizza Margherita</p>
            </div>
          </a>
        </div>

        <div class="col-12 col-lg-4 card recipe">
          <a href="rezept.php">
            <img src="../img/burger.jpg" class="card-img-top">
            <div class="card-body">
              <p class="card-text ">Pizza Margherita</p>
            </div>
          </a>

        </div>
        <div class="col-12 col-lg-4 card recipe">
          <a href="rezept.php">
            <img src="../img/indian.jpg" class="img-fluid">
          <div class="card-body">
            <p class="card-text ">Chicken Curry</p>
          </div>
          </a>
          
        </div>
      </div>
      <div class="row mb-5">
        <div class="col-12 col-lg-4 card recipe">
          <a href="rezept.php">
            <img src="../img/lahmacun.jpg" class="img-fluid">
            <div class="card-body">
              <p class="card-text ">Lahmacun</p>
            </div>
          </a>
          
        </div>
        <div class="col-12 col-lg-4 card recipe">
          <a href="rezept.php">
            <img src="../img/paella.jpg" class="img-fluid">
            <div class="card-body">
              <p class="card-text ">Paella</p>
            </div>
          </a>
          
        </div>
        <div class="col-12 col-lg-4 card recipe">
          <a href="rezept.php">
            <img src="../img/torte.jpg" class="img-fluid">
            <div class="card-body">
              <p class="card-text ">Sahne-Kirsch-Torte</p>
            </div>
          </a>
          
        </div>
      </div>
      <div class="row mb-5">
        <div class="col-12 col-lg-4 card recipe">
          <a href="rezept.php">
            <img src="../img/ramen.jpg" class="img-fluid">
          <div class="card-body">
            <p class="card-text ">Ramen</p>
          </div>
          </a>
          
        </div>
        <div class="col-12 col-lg-4 card recipe">
          <a href="rezept.php">
            <img src="../img/sushi.jpg" class="img-fluid">
          <div class="card-body">
            <p class="card-text ">Sushi Platte</p>
          </div>
          </a>
          
        </div>
        <div class="col-12 col-lg-4 card recipe">
          <a href="rezept.php">
            <img src="../img/pide.jpg" class="img-fluid">
          <div class="card-body">
            <p class="card-text ">Hackfleisch Pide</p>
          </div>
          </a>
          
        </div>
      </div>
    <!-- <div class="row mb-5">
      <div class="col card recipe">
        <img class="img-fluid card-img-top">
        <div class="card-body">
          <p></p>
        </div>
      </div>
      <div class="col card recipe"></div>
      <div class="col card recipe"></div>
    </div> -->
    </div>
    

  </main>

  <footer class="site-footer">
    <div class="container">
      <p>© Cook &amp; Share — Team Rath &amp; Wollinger</p>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>