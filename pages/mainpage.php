<?php $title = 'Cook & Share'?>

<?php include "../includes/header.php" ?>
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
          <a href="recipe.php">
            <img src="../img/pizza.jpg" class="card-img-top">
            <div class="card-body">
              <p class="card-text ">Pizza Margherita</p>
            </div>
          </a>
        </div>

        <div class="col-12 col-lg-4 card recipe">
          <a href="recipe.php">
            <img src="../img/burger.jpg" class="card-img-top">
            <div class="card-body">
              <p class="card-text ">Pizza Margherita</p>
            </div>
          </a>

        </div>
        <div class="col-12 col-lg-4 card recipe">
          <a href="recipe.php">
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
    </div>

  </main>

  <?php include "../includes/footer.php" ?>
</body>

</html>