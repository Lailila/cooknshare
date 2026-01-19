<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$title = 'Rezept';
require_once "../DB/DBconnect.php";
include "../includes/header.php";
$userId = $_SESSION['login_user']['id'] ?? null;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn_favorite'])) {
  if (empty($userId)) { //favorite_button gedrückt, aber nicht angemeldet -> login
    header("Location: ../signup_in/login_form.php");
    exit;
  }
  $recipeId = (int) $_POST['recipe_id'];
  $check = connect()->prepare("SELECT 1 FROM favorites WHERE user_id = ? AND recipe_id = ?");
  $check->execute([$userId, $recipeId]);
  if (!empty($check->fetch())) {  //es war bei den favoriten und wird wieder entfernt
    $del = connect()->prepare("DELETE FROM favorites WHERE user_id = ? AND recipe_id = ?");
    $del->execute([$userId, $recipeId]);
  } else { //es wird erst hinzugefügt
    $ins = connect()->prepare("INSERT INTO favorites (user_id, recipe_id) VALUES (?, ?)");
    $ins->execute([$userId, $recipeId]);
  }
  header("Location: recipe.php?id=" . $recipeId);
  exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn_comment'])) {  //Kommentar speichern
  if (empty($userId)) {
    header("Location: ../signup_in/login_form.php");
    exit;
  }

  $recipeId = (int) $_POST['recipe_id'];
  $comment = trim($_POST['comment'] ?? '');

  if ($comment === '') {
    header("Location: recipe.php?id=" . $recipeId);
    exit;
  }
  $stmt = connect()->prepare("INSERT INTO comments (recipe_id, user_id, comment, created_at) VALUES (?, ?, ?, NOW())");
  $stmt->execute([$recipeId, $userId, $comment]);

  header("Location: recipe.php?id=" . $recipeId);
  exit;
}
//eigenen Kommentar löschen:
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn_delete_comment'])) {
  if (empty($userId)) {
    header("Location: ../signup_in/login_form.php");
    exit;
  }
  $commentId = (int) $_POST['comment_id'];
  $recipeId = (int) $_POST['recipe_id'];

  $stmt = connect()->prepare("DELETE FROM comments WHERE id = ? AND (user_id = ? OR ? = 'admin')");
  $stmt->execute([$commentId, $userId, $_SESSION['login_user']['role'] ?? '']);

  header("Location: recipe.php?id=" . $recipeId);
  exit;
}

$id = $_GET['id'] ?? null;  //rezept id in der URL

if (empty($id)) {
  echo "<p>Kein Rezept ausgewählt</p>";
  include "../includes/footer.php";
  exit;
}
//Rezept aus DB fetchen
$stmt = connect()->prepare("SELECT r.id, r.title, r.image_path, r.ingredients, r.description, r.created_at, u.username FROM recipes r JOIN users u ON r.user_id = u.id WHERE r.id = ?");
$stmt->execute([$id]);
$recipe = $stmt->fetch();
if (empty($recipe)) {
  echo "<p>Rezept nicht gefunden.</p>";
  include "../includes/footer.php";
  exit;
}


$isfavorite = false;
if (!empty($userId)) {  //wenn Rezept schon gespeichert ist beim Aufruf
  $favStmt = connect()->prepare("SELECT 1 From favorites WHERE user_id = ? AND recipe_id = ?");
  $favStmt->execute([$userId, $recipe['id']]);
  $isfavorite = (bool) $favStmt->fetch();
}
//Kommentare aus der DB:
$stmt = connect()->prepare("SELECT c.id, c.comment, c.user_id, c.created_at, u.username FROM comments c JOIN users u ON c.user_id = u.id WHERE recipe_id = ? ORDER BY c.created_at DESC");
$stmt->execute([$recipe['id']]);
$comments = $stmt->fetchAll();
?>

<div class="recipe container main-wrap">
  <div class="r-image">
    <img class="card-img-top mb-5"
      src="<?= htmlspecialchars($recipe['image_path']) ?>"
      alt="<?= htmlspecialchars($recipe['title']) ?>" />
  </div>
  <div class="r-title shadow p-3 mb-5 bg-body rounded">
    <h1 class="mb-3"><?= htmlspecialchars($recipe['title']) ?></h1>
    <div class="UN-favBut">
      <p>von <?= htmlspecialchars($recipe['username']) ?></p>
      <?php if (!empty($userId)): ?>
        <form method="POST" class="d-inline">
          <input type="hidden" name="recipe_id" class="recipe_id" value="<?= (int)$recipe['id'] ?>">
          <button type="submit" name="btn_favorite" class="btn <?= $isfavorite ? 'btn-secondary' : 'btn-outline-secondary' ?>"><?= $isfavorite ? '★ Favorit' : '☆ Favorit' ?></button>
        </form>
      <?php else: ?>
        <p class="text-muted">Bitte einloggen, um als Favorit zu speichern</p>
      <?php endif; ?>
    </div>
  </div>

  <div class="ingredients shadow p-3 mb-5 bg-body rounded">
    <h2>Zutaten</h2>
    <?php
    $ingredients = explode(",", $recipe['ingredients']); //wandelt string in array, elemente durch komma getrennt in DB
    foreach ($ingredients as $ingredient):
      $ingredient = trim($ingredient);  //schneidet Leerzeichen ab
      if ($ingredient === '') continue; //überspringt leere Werte?>
      <p><?= htmlspecialchars($ingredient) ?></p>
    <?php endforeach; ?>
  </div>

  <div class="description mb-5 shadow p-3 bg-body rounded">
    <h2>Anleitung</h2>
    <?php $steps = explode(".", $recipe['description']);
    foreach ($steps as $step):
      $step = trim($step);
      if ($step === "") continue;?>
      <p><?= htmlspecialchars($step) ?></p>
    <?php endforeach; ?>
  </div>

  <section class="comment shadow p-3 bg-body rounded">
    <h2>Kommentare</h2>
    <?php if (empty($comments)): ?>
      <p class="text-muted">Schreibe den ersten Kommentar.</p>
    <?php else: ?>
      <?php foreach ($comments as $comment): ?>
        <div class="comment mb-3">
          <p class="comment-meta"><strong><?= htmlspecialchars($comment['username']) ?></strong> • <?= date('d.m.Y', strtotime($comment['created_at'])) ?></p>
          <p><?= htmlspecialchars($comment['comment']) ?></p>
          <!-- Kommentar löschen Form-->
          <?php if (!empty($userId) && ($comment['user_id'] === $userId) || ($_SESSION['login_user']['role'] ?? '') === 'admin'): ?>
            <form method="POST" class="mt-1">
              <input type="hidden" name="comment_id" value="<?= (int)$comment['id'] ?>">
              <input type="hidden" name="recipe_id" value="<?= (int)$recipe['id'] ?>">
              <button type="submit" name="btn_delete_comment" class="btn btn-sm btn-outline-danger">Kommentar löschen</button>
            </form>
          <?php endif; ?>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>

    <?php if (!empty($userId)): ?>
      <form method="POST" class="mt-3">
        <input type="hidden" name="recipe_id" value="<?= (int)$recipe['id'] ?>">
        <div class="mb-3">
          <label for="comment" class="form-label">Dein Kommentar</label>
          <textarea class="form-control" name="comment" id="comment" rows="3" required></textarea>
        </div>
        <button type="submit" name="btn_comment" class="btn btn-primary">
          Kommentar absenden
        </button>
      </form>
    <?php else: ?>
      <p class="text-muted mt-3">Bitte einloggen, um einen Kommentar zu schreiben.</p>
    <?php endif; ?>

  </section>
</div>

<?php include "../includes/footer.php"; ?>