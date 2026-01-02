<?php 
  $title = 'Mein Profil';
  include "../includes/header.php";
?>

<?php
//$userId = $_SESSION['user_id']; //sobald login aktuell ist

//test-user:
$userId = 7;
$statement = $conn->prepare("
SELECT username, email, created_at, image_path FROM users WHERE id = ?
");
$statement->bind_param("i", $userId);
$statement->execute();
$statement->bind_result($username, $email, $created_at, $image_path);
$statement->fetch();
$statement->close();
$user = [
  'username' => $username,
  'email' => $email,
  'created_at' => $created_at,
  'image_path' => $image_path,
];

//Rezepte zählen, die User hochgeladen hat
$recipeCount = 0;
$statementRecipe = $conn->prepare("SELECT COUNT(*) FROM recipes WHERE user_id = ?");
$statementRecipe->bind_param("i", $userId);
$statementRecipe->execute();
$statementRecipe->bind_result($recipeCount);
$statementRecipe->fetch();

require "../includes/header.php"; ?>
  <div class="align-items-center vh-100 justify-content-between d-flex">
  <div class="container-fluid">
    <div class="row">
    <div class="col-lg-4 col-12 text-center">
      <img src="<?= $user['image_path'] ? '../uploads/' . htmlspecialchars($user['image_path']) : '../img/profile-default.svg' ?>" alt="" class="img-fluid rounded-5 mb-5">
      <button class="btn btn-primary fs-4">neues Profilbild hochladen</button>
    </div>
    <div class="col-lg-8 col-12">
      <table class="table table-hover fs-4">
        <tr>
          <td class="fw-bold">Username:</td>
          <td><?=  htmlspecialchars($user['username']) ?></td>
        </tr>
        <tr>
          <td class="fw-bold">E-Mail:</td>
          <td><?= htmlspecialchars($user['email']) ?></td>
        </tr>
        <tr>
          <td class="fw-bold">Hochgeladene Rezepte:</td>
          <td><?= $recipeCount ?></td>
        </tr>
        <tr>
          <td class="fw-bold">beigetreten am:</td>
          <td><?= date("d.m.Y", strtotime($user['created_at'])) ?></td>
        </tr>
      </table>
    </div>
  </div>
  </div>
</div>

<?php require "../includes/footer.php"; ?>