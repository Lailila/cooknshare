<?php
session_start();
require_once '../classes/UserLogic.php';
require_once '../security.php';

$is_login = UserLogic::checkLogin();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $title?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link rel="stylesheet" href="../style/index.css">
</head>

<body>

<header>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark px-5">
      <div class="container-fluid">
        <a class="navbar-brand" href="../pages/mainpage.php"><img src="../img/frying-pan_10647075.png"
            class="d-inline-block align-text-top me-2 index-logo" alt="Cook & Share Logo"></a>
        <div class="navbar-collapse d-flex">
          <?php if($is_login): ?>
            <!-- wenn man eingeloggt ist -->
             <ul class="navbar-nav me-auto mb-2 mb-sm-0">
            <li class="nav-item">
              <a class="nav-link active" href="../pages/dashboard.php">Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../pages/favorite.php">Favoriten</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../pages/upload_form.php">Upload</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../pages/profil.php">Profil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../pages/MyRecipe.php">Meine Rezepte</a>
            </li>
          </ul>
            <form action= "../signup_in/logout.php" method="POST">
                <input class="btn btn-secondary" type="submit" name="logout" value="logout">
            </form>
          <?php else: ?>
            <!-- wenn man nicht eingeloggt ist -->
             <ul class="navbar-nav me-auto mb-2 mb-sm-0">
              </ul>
              <a class="nav-link" href="../signup_in/login_form.php">
                <button class="btn btn-secondary">Anmelden</button>
              </a>
             
          <?php endif; ?>
        </div>
    </nav>
  </header>