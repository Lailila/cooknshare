<?php
//Diese Datei enthält die Login-Seite, dort kann man mit seinem Benutzername und Passwort anmelden.
//Sobald das Login-Button geklickt wird, wird eine Validationseite (login.php) geöffnet und die Eingaben werden validiert.
//Falls die Eingaben falsch oder leer sind, wird der Browser auf diese Seite zurückgeleitet und Fehlermeldungen werden angezeigt.
session_start();
require_once '../classes/UserLogic.php';
require_once '../security.php';

//CheckLogin ist eine Klasse, um es zu prüft, ob man eingeloggt ist. Wenn ja, gibt sie true zurück. Sonst falsch.
$is_login = UserLogic::checkLogin();

//wenn man schon eingeloggt ist, wird der Browser auf dashboard.php weitergeleitet.
if ($is_login) {
  header('Location: ../pages/dashboard.php');
  return;
}

//wenn man nicht eingeloggt ist, wird die Session zerstört.
$err = $_SESSION;
$_SESSION = array();
session_destroy();

$title = 'Login';
include "../includes/header.php";
?>

<div class="container main-wrap">
  <h3 class="text-center page-title">Login</h3>

  <form action="login.php" method="POST" class="login-card mx-auto">
    <div class="card card-accent shadow rounded-4 p-4 mb-4">
      <div class="mb-3">
        <label for="username" class="form-label">Benutzername</label>
        <input class="form-control" type="text" name="username" placeholder="Benutzername" id="username-register">
        <!-- Fehlermeldung, wenn username leer ist -->
        <?php if (isset($err['username'])) : ?>
          <p class="text-danger"><?php echo $err['username']; ?></p>
        <?php endif; ?>
      </div>

      <div class="mb-4">
        <label for="password" class="form-label">Passwort</label>
        <input class="form-control" type="password" name="password" placeholder="Passwort" id="password-register">
        <!-- Fehlermeldung, wenn password leer ist -->
        <?php if (isset($err['password'])) : ?>
          <p class="text-danger"><?php echo $err['password']; ?></p>
        <?php endif; ?>
      </div>

      <!-- Fehlermeldung, wenn username oder password falsch ist, oder beides falsch sind -->
      <?php if (isset($err['msg'])) : ?>
        <p class="text-danger"><?php echo $err['msg']; ?></p>
      <?php endif; ?>

      <div class="d-grid gap-2">
        <input type="submit" value="Login">
      </div>
    </div>
  </form>

  <div class="text-center link"><a class="text-primary" href="signup_form.php">Registrieren</a></div>
</div>

<?php include "../includes/footer.php" ?>