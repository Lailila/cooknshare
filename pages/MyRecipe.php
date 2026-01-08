<?php
session_start();
require_once '../classes/UserLogic.php';
require_once '../classes/db_access.php';
require_once '../security.php';
require_once "../DB/DBconnect.php";

//prüft, ob man eingeloggt ist. Wenn ja, gibt sie true zurück. Sonst falsch.
$result = UserLogic::checkLogin();
if (!$result) {
  header('Location: ../signup_in/login_form.php');
  return;
}

$user_id = $_SESSION['login_user']['id'];
$recipes = db_access::getRecipesByUserId($user_id);
// var_dump($recipes);


$title = 'Mein Profil';
include "../includes/header.php";
?>
<div class="container">
  <h1 class="favoriten">meine Rezepte</h1>

  <?php if (!empty($recipes)): ?>
    <ul class="fav-list">
      <?php foreach ($recipes as $recipe): ?>
        <li class="item">
          <a href="rezept.php">
            <img src="<?= htmlspecialchars($recipe['image_path'], ENT_QUOTES, 'UTF-8') ?>"
              alt="<?= htmlspecialchars($recipe['title'], ENT_QUOTES, 'UTF-8') ?>" />
            <div class="item-detail">
              <p class="item-title ellipsis-1"><?= htmlspecialchars($recipe['title'], ENT_QUOTES, 'UTF-8') ?></p>
              <p class="zutaten ellipsis-2"><?= htmlspecialchars($recipe['ingredients'], ENT_QUOTES, 'UTF-8') ?></p>
              <p class="user">von <?= htmlspecialchars($_SESSION['login_user']['username'], ENT_QUOTES, 'UTF-8') ?></p>
            </div>
          </a>
        </li>
      <?php endforeach; ?>
    </ul>
  <?php else: ?>
    <p>Keine Rezepte</p>
  <?php endif; ?>

</div>
<?php include "../includes/footer.php"; ?>