<?php
//Auf dieser Seite kann man ein Rezept bearbeiten. In jedem Formular werden die originelle Inhalt behalten, aber eine Bild-Datei muss wieder ausgewählt werden.
//wenn man das Aktualisieren-Button klickt, wird der Browser auf update_recipe.php weiter geleitet und wird es geprüft, ob nichts leer ist(wie upload-form). Falls was leer ist, wird diese Seite zurückgeleitet und kommen Fehlermeldungen vor(Validation).
session_start();
require_once '../classes/db_access.php';
require_once '../classes/UserLogic.php';
require_once '../security.php';
require_once "../DB/DBconnect.php";

if (!UserLogic::checkLogin()) {
  header('Location: ../signup_in/login_form.php');
  exit;
}

//wenn man z.B. auf der Adressleiste "http://localhost/cooknshare/pages/edit_recipe_form.php" eingibt, wird der Browser auf MyRecipe.php weitergeleitet.
if (!isset($_GET['id'])) {
  header('Location: MyRecipe.php');
  exit;
}

$err_msgs = $_SESSION['err_msgs'] ?? [];
unset($_SESSION['err_msgs']);

//wenn was leer ist und wird der Browser auf diese Seite zurückgeleitet, werden Eingaben behalten
$old = $_SESSION['old'] ?? [];
unset($_SESSION['old']);

$userId = $_SESSION['login_user']['id'];
//Die ID des geklickten Rezeptes wird aus der URL gelesen und in eine Zahl umgewandelt
$recipe_id = (int)$_GET['id'];

//auf DB zugreifen
$pdo = connect();
//das entsprechende Rezept anhand der Rezept-ID und der User-ID aus DB abrufen
$stmt = $pdo->prepare("
  SELECT id, title, category, image_path, ingredients, description
  FROM recipes
  WHERE id = :id AND user_id = :user_id
");
$stmt->execute([
  ':id' => $recipe_id,
  ':user_id' => $userId
]);
$recipe = $stmt->fetch();


if (!$recipe) {
  header('Location: MyRecipe.php');
  exit;
}

//wenn $old vorhanden ist, ist $form $old, sonst ist es $recipe
$form = array_merge($recipe, $old);

$title = 'Rezept bearbeiten';
include "../includes/header.php";
?>

<div class="upload container main-wrap">
  <h2 class="page-title mb-5 text-center"><em>Rezept Bearbeiten</em></h2>
  <div class="container-fluid">
    <form action="./update_recipe.php" method="post" enctype="multipart/form-data">

      <div class="mb-3">
        <label class="fs-4 mb-2" for="rezept-title">Titel:</label>
        <input class="form-control" type="text" id="rezept-title" name="title" value="<?php echo htmlspecialchars($form['title'] ?? '', ENT_QUOTES); ?>">

        <?php if (isset($err_msgs['title'])) : ?>
          <p class="text-danger"><?php echo $err_msgs['title']; ?></p>
        <?php endif; ?>
        <?php if (isset($err_msgs['title_size'])) : ?>
          <p class="text-danger"><?php echo $err_msgs['title_size']; ?></p>
        <?php endif; ?>
      </div>


      <div class="mb-3">
        <p class="fs-4 mb-2">Kategorie</p>
        <div>
          <input type="radio" id="category1" name="category" value="appetizer" <?php if (($form['category'] ?? '') === 'appetizer') echo 'checked'; ?>>
          <label for="category1">Vorspeise</label>

          <input type="radio" id="category2" name="category" value="maindish" <?php if (($form['category'] ?? '') === 'maindish') echo 'checked'; ?>>
          <label for="category2">Hauptspeise</label>

          <input type="radio" id="category3" name="category" value="dessert" <?php if (($form['category'] ?? '') === 'dessert') echo 'checked'; ?>>
          <label for="category3">Nachspeise</label>
        </div>
        <?php if (isset($err_msgs['category'])) : ?>
          <p class="text-danger"><?php echo $err_msgs['category']; ?></p>
        <?php endif; ?>
      </div>

      <div class="mb-3">
        <label for="rezept-zutaten" class="fs-4 mb-2">Zutaten:</label>
        <textarea class="form-control" id="rezept-zutaten" placeholder="100g Mehl, 1 Ei, 30g Zucker, ..." name="ingredients"><?php echo htmlspecialchars($form['ingredients'] ?? '', ENT_QUOTES); ?></textarea>
        <?php if (isset($err_msgs['ingredients'])) : ?>
          <p class="text-danger"><?php echo $err_msgs['ingredients']; ?></p>
        <?php endif; ?>
      </div>

      <div class="mb-3">
        <label for="Anleitung" class="fs-4 mb-2">Anleitung:</label>
        <textarea class="form-control" name="description" id="Anleitung"  ><?php echo htmlspecialchars($form['description'] ?? '', ENT_QUOTES); ?></textarea>
        <?php if (isset($err_msgs['description'])) : ?>
          <p class="text-danger"><?php echo $err_msgs['description']; ?></p>
        <?php endif; ?>
      </div>

      <div class="mb-5">
        <label for="formFile" class="form-label fs-4 mb-2">Bild hochladen</label>
        <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
        <input class="form-control" type="file" id="formFile" accept="image/*" name="img">
        <?php if (isset($err_msgs['filesize'])) : ?>
          <p class="text-danger"><?php echo $err_msgs['filesize']; ?></p>
        <?php endif; ?>
        <?php if (isset($err_msgs['file_type'])) : ?>
          <p class="text-danger"><?php echo $err_msgs['file_type']; ?></p>
        <?php endif; ?>
        <!-- das ID vom Rezept senden -->
        <input type="hidden" name="recipe_id" value="<?= $recipe_id ?>">
      </div>
      <div class="d-grid gap-2">
        <input type="submit" value="Rezept aktualisieren">
      </div>
    </form>
  </div>
</div>
<?php require __DIR__ . "/../includes/footer.php"; ?>