<?php 
  $title = 'Meine Favoriten';
  include "../includes/header.php";
?>

  <main class="container">
    <h1 class="favoriten">meine Favoriten</h1>
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

  <?php include "../includes/footer.php" ?>
</body>
</html>
