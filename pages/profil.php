<?php  
require "../includes/secure.php";
require_once "../DB/DBconnect.php";
$title = 'Mein Profil';
$currentPage = 'profil';
$user = $_SESSION['login_user'];
$userId = $user['id'];

include "../includes/header.php";

if(isset($_POST['upload_image']) && isset($_FILES['profile_image'])){
  $file = $_FILES['profile_image'];
  $errors = [];

  if($file['error'] !== 0){
    $errors[] = "Datei konnte nicht hochgeladen werden.";
  }

  if(!empty($file['tmp_name']) && !getimagesize($file['tmp_name'])){
    $errors[] = "Die Datei ist kein gültiges Bild.";
  }

  $allowedTypes = ['image/jpeg', 'image/png', 'image/webp'];
  if(!in_array($file['type'], $allowedTypes)){
    $errors[] = "Nur JPG, PNG oder WEBP erlaubt.";
  }

  if(!empty($errors)){
    $_SESSION['upload_errors'] = $errors;
    header("Location: profil.php");
    exit;
  }


  //ohne Fehler geklappt:
  $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
  $newFileName = 'user_' . $userId . '_' . time() . '.' . $extension;
  $uploadDir = __DIR__ . "/../uploads/profile/";
  $uploadPath = $uploadDir . $newFileName;

  if(!is_dir($uploadDir)){
    mkdir($uploadDir, 0755, true);
  }

  if(!is_uploaded_file($file['tmp_name'])){
    die("Keine echte Upload Datei");
  }

  if(!move_uploaded_file($file['tmp_name'], $uploadPath)) {
    $_SESSION['upload_errors'] = ["Die Datei konnte nicht gespeichert werden."];
    header("Location: profil.php");
    exit;
  }

  $stmt = connect()->prepare(
    "UPDATE users SET image_path = ? WHERE id = ?"
  );
  $stmt->execute([$newFileName, $userId]);
  $_SESSION['login_user']['image_path'] = $newFileName;

  $_SESSION['upload_success'] = "Profilbild erfolgreich aktualisiert.";
  header("Location: profil.php");
  exit;
}

//Rezepte zählen, die User hochgeladen hat
$recipeCount = 0;
$stmt = connect()->prepare("SELECT COUNT(*) FROM recipes WHERE user_id = ?");
$stmt->execute([$userId]);
$recipeCount = $stmt->fetchColumn();
?>

  <div class="align-items-center vh-100 justify-content-between d-flex">
  <div class="container-fluid">
    <div class="row">
    <div class="col-lg-4 col-12 text-center">
      <?php if (!empty($_SESSION['upload_errors'])): ?>
        <div class="alert alert-danger fs-5">
          <ul class="mb-0">
            <?php foreach ($_SESSION['upload_errors'] as $error): ?>
            <li><?=  htmlspecialchars($error) ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
      <?php unset($_SESSION['upload_errors']); endif; ?>

      <?php if(!empty($_SESSION['upload_success'])): ?>
        <div class="alert alert-success fs-5"><?= htmlspecialchars($_SESSION['upload_success']) ?></div>
      <?php unset($_SESSION['upload_success']); endif; ?>

      <img src="<?= $user['image_path'] ? '../uploads/profile/' . htmlspecialchars($user['image_path']) : '../img/profile-default.svg' ?>" alt="" class="img-fluid rounded-5 mb-5">
      <form action="profil.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="profile_image" class="form-control mb-3" accept="image/*" required>
        <button type="submit" name="upload_image" class="btn btn-primary fs-4">neues Profilbild hochladen</button>
      </form>
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