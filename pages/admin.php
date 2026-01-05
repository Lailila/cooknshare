<?php 
echo __DIR__;
/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);*/
$requiredRole = "admin";
require __DIR__ . "/../includes/secure.php";
require_once __DIR__ . "/../DB/DBconnect.php";
$users = connect()->query("SELECT id, username, email, created_at, role FROM users ORDER BY created_at DESC")->fetchAll();
$recipes = connect()->query("
  SELECT r.id, r.title, r.created_at, u.username FROM recipes r JOIN users u ON r.user_id = u.id ORDER BY r.created_at DESC
")->fetchAll();

$currentPage = 'admin';
require __DIR__ . "/../includes/header.php"; ?>
  <div class="container-fluid p-5">
    <h3 class="text-center mb-3">User</h3>
    <table class="table table-hover mb-5">
      <tr>
        <th scope="col">#</th>
        <th scope="col">User</th>
        <th scope="col">beigetreten am</th>
        <th scope="col">deaktivieren</th>
      </tr>
      <?php foreach($users as $user): ?>
        <tr>
          <th scope="row"><?= (int)$user['id'] ?></th>
          <td>
            <?= htmlspecialchars($user['username']) ?>
            <br>
            <small class="text-muted"><?= htmlspecialchars($user['email']) ?></small>
            <br>
            <small class="badge bg-secondary"><?= htmlspecialchars($user['role'] ?? 'user') ?></small>
          </td>
          <td><?= date('d.m.Y', strtotime($user['created_at'])) ?></td>
          <td>
            <?php if($user['id'] != $_SESSION['login_user']['id']): ?>
              <form action="delete_user.php" method="POST" onsubmit="return confirm('User wirklich löschen?');">
                <input type="hidden" name="user_id" value="<?= (int)$user['id'] ?>">
                <button type="submit" class="btn btn-danger btn-sm">✓</button>
              </form> 
            <?php else: ?>
              <span class="text-muted">-</span>
              <?php endif; ?>
          </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <h3 class="text-center mb-3">Rezepte</h3>
    <table class="table table-hover mb-5">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Titel</th>
        <th scope="col">User</th>
        <th scope="col">erstellt am</th>
        <th scope="col">löschen</th>
      </tr>
      <?php foreach($recipes as $recipe): ?>
      <tr>
        <th scope="row"><?= (int)$recipe['id'] ?></th>
        <td><?= htmlspecialchars($recipe['title']) ?></td>
        <td><?= htmlspecialchars($recipe['username']) ?></td>
        <td><?= date('d.m.Y', strtotime($recipe['created_at'])) ?></td>
        <td>
          <form action="delete_recipe.php" method="POST" onsubmit="return confirm('Rezept wirklich löschen?');">
          <input type="hidden" name="recipe_id" value="<?= (int)$recipe['id'] ?>">
          <button type="submit" class="btn btn-danger btn-sm">✓</button>
          </form>
        </td>
      </tr>
      <?php endforeach; ?>
    </table>
    <h3 class="text-center mb-3">Kommentare</h3>
    <table class="table table-hover">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Kommentar</th>
        <th scope="col">User</th>
        <th scope="col">erstellt am</th>
        <th scope="col">löschen</th>
      </tr>
      <tr>
        <th scope="row">1</th>
        <td>"Super lecker! Werde ich auf jeden Fall wieder machen."</td>
        <td>Max</td>
        <td>03.02.2024</td>
        <td><button class="btn btn-primary">✓</button></td>
      </tr>
      <tr>
        <th scope="row">2</th>
        <td>"Leider etwas trocken. Ich würde lieber noch etwas Milch hinzugeben."</td>
        <td>Lisa</td>
        <td>12.10.2025</td>
        <td><button class="btn btn-primary">✓</button></td>
      </tr>
      <tr>
        <th scope="row">3</th>
        <td>"Hat der ganzen Familie geschmeckt, vielen Dank!"</td>
        <td>Andrea</td>
        <td>24.08.2025</td>
        <td><button class="btn btn-primary">✓</button></td>
      </tr>
    </table>
  </div>
<?php require __DIR__ . "/../includes/footer.php"; ?>