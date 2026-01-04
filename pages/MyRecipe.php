<?php
session_start();
require_once '../classes/UserLogic.php';
require_once '../classes/db_access.php';
require_once '../security.php';

//prüft, ob man eingeloggt ist. Wenn ja, gibt sie true zurück. Sonst falsch.
$result = UserLogic::checkLogin();
if (!$result) {
  header('Location: ../signup_in/login_form.php');
  return;
}


$if_anyRecipes = db_access::getRecipeByUserId($user_id);
var_dump($_SESSION['login_user']['id']);
$user_id = $_SESSION['login_user']['id'];


$title = 'Mein Profil';
include "../includes/header.php";
?>
<div class="container">
  <h1 class="favoriten">meine Rezepte</h1>
  <ul class="fav-list">
  
  <?php if (isset($err_msgs['category'])) : ?>
          <p class="text-danger"><?php echo $err_msgs['category']; ?></p>
        <?php endif; ?>
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
</div>
<?php require __DIR__ . "/../includes/footer.php"; ?>