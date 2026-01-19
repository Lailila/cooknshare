<?php
//Diese Datei enthält den header, der auf jeder Seite miteingebunden wird.
//Die Navbar wird angepasst je nachdem, ob man angemeldet ist/Admin ist oder nicht angemeldet.

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
  <title><?php echo $title ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <!-- php time() funktion, damit css nicht aus dem cache geladen wird, zum debuggen -->
  <link rel="stylesheet" href="../style/index.css?v=<?= time() ?>">
</head>

<body>
  <header id="header" class="wrapper">
    <h1 class="logo">
      <a href="../pages/mainpage.php"><img src="../img/frying-pan_10647075.png" alt="Cook & Share"></a>
    </h1>

    <!-- wenn man eingeloggt ist, werden navigation und hamburger-button sichtbar -->
    <?php if ($is_login): ?>
      <nav id="navi">
        <ul id="navi-menu" class="h-navi">
          <li><a href="../pages/dashboard.php">Dashboard</a></li>
          <li><a href="../pages/favorite.php">Favoriten</a></li>
          <li><a href="../pages/upload_form.php">Upload</a></li>
          <li><a href="../pages/profil.php">Profil</a></li>
          <li><a href="../pages/MyRecipe.php">Meine Rezepte</a></li>
          <!-- wenn user die Rolle admin hat wird navbar Punkt sichtbar -->
          <?php if (($_SESSION['login_user']['role'] ?? '') === 'admin'): ?>
            <li><a href="../pages/admin.php">Admin</a></li>
          <?php endif; ?>
          <li>
            <form action="../signup_in/logout.php" method="POST">
              <button type="submit" name="logout" value="logout" class="logout-link">
                Logout
              </button>
            </form>

          </li>
        </ul>
      </nav>
      <!-- für Handy-Bildschirm -->
      <button class="hamburger">
        <span></span>
        <span></span>
        <span></span>
      </button>

      <!-- wenn man nicht eingeloggt ist, wird nur Anmelden-Button sichtbar-->
    <?php elseif ($title === 'Cook & Share'||$title === 'Rezept'): ?>
      <a href="../signup_in/login_form.php">
        <button class="btn btn-secondary">Anmelden</button>
      </a>

    <?php endif; ?>

  </header>
  <main>