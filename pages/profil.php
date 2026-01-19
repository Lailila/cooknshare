<?php 
//Diese Datei enthält die Profil-Seite, dort werden Informationen und Bild des Users angezeigt. Man kann ein neues Profilbild hochladen, dabei wird das alte gelöscht

require "../includes/secure.php";
require_once "../DB/DBconnect.php";
$title = 'Mein Profil';
$user = $_SESSION['login_user'];
$userId = $user['id'];
include "../includes/header.php";

//Profilbild hochladen
if (isset($_POST['upload_image']) && isset($_FILES['profile_image'])) {
  $file = $_FILES['profile_image'];
  $errors = [];

  if ($file['error'] !== 0) {
    $errors[] = "Datei konnte nicht hochgeladen werden.";
  }

  if(!empty($file['tmp_name']) && !getimagesize($file['tmp_name'])){  //getimagesize() prüft ob die Datei wirklich ein Bild ist.
    $errors[] = "Die Datei ist kein gültiges Bild.";
  }

  $maxFileSize = 5 * 1024 * 1024; // 5 MB Größe erlaubt
  if ($file['size'] > $maxFileSize) {
    $errors[] = "Das Bild darf maximal 5 MB groß sein.";
}

  $allowedTypes = ['image/jpeg', 'image/png', 'image/webp'];
  if (!in_array($file['type'], $allowedTypes)) {
    $errors[] = "Nur JPG, PNG oder WEBP erlaubt.";
  }

  if(!empty($errors)){  //Fehler sind vorhanden, werden in Session gespeichert und dann ausgegeben
    $_SESSION['upload_errors'] = $errors;
    header("Location: profil.php");
    exit;
  }


  //ohne Fehler geklappt:
  $extension = pathinfo($file['name'], PATHINFO_EXTENSION); //Extension wird zwischengespeichert
  $newFileName = 'user_' . $userId . '_' . time() . '.' . $extension; //Neuer user-spezifischer Name mit Timestamp, jedes Bild ist also eindeutig
  $uploadDir = __DIR__ . "/../uploads/profile/";  //absoluer Serverpfad
  $imagePath = "/cooknshare/uploads/profile/" . $newFileName;  //Pfad für die DB
  $uploadPath = $uploadDir . $newFileName; //absoluter Upload Pfad

  $oldImage = $user['image_path'] ?? null; //alten Pfad zum löschen

  if (!is_uploaded_file($file['tmp_name'])) {
    die("Keine echte Upload Datei");
  }

  //Bild wird in Uploadordner geschoben
  if(!move_uploaded_file($file['tmp_name'], $uploadPath)) {
    $_SESSION['upload_errors'] = ["Die Datei konnte nicht gespeichert werden."];
    header("Location: profil.php");
    exit;
  }

  if(!empty($oldImage) && $oldImage !== '/cooknshare/img/profile-default.svg'){
    $oldImageServerPath = $_SERVER['DOCUMENT_ROOT'] . $oldImage; //absoluter Serverpfad, da direkter Zugriff auf Dateisystem mit unlink()
    if(file_exists($oldImageServerPath)){
      unlink($oldImageServerPath);   //löscht irreversibel
    }
  }
  
  //neuer Profilbildpfad wird gesetzt
  $stmt = connect()->prepare(
    "UPDATE users SET image_path = ? WHERE id = ?"
  );
  $stmt->execute([$imagePath, $userId]);
  $_SESSION['login_user']['image_path'] = $imagePath;

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
<!-- Fehlermeldungen, falls vorhanden-->
      <?php if (!empty($_SESSION['upload_errors'])): ?>
        <div class="alert alert-danger fs-5">
          <ul class="mb-0">
            <?php foreach ($_SESSION['upload_errors'] as $error): ?>
            <li><?=  htmlspecialchars($error) ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
      <?php unset($_SESSION['upload_errors']); endif; ?>
<!-- Wenn ein Bild erfolgreich hochgeladen wurde -->
      <?php if(!empty($_SESSION['upload_success'])): ?>
        <div class="alert alert-success fs-5"><?= htmlspecialchars($_SESSION['upload_success']) ?></div>
      <?php unset($_SESSION['upload_success']); endif; ?>
<!-- Profilinformationen -->
      <img src="<?= $user['image_path'] ? htmlspecialchars($user['image_path']) : '/cooknshare/img/profile-default.svg' ?>" alt="Profilbild" class="profile-image mb-5">
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

  <?php require "../includes/footer.php"; ?>