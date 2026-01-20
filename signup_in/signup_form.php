<?php
//Diese Datei enthält die Registrieren-Seite, dort kann man mit seinem Benutzername, Email und Passwort ein Konto erstellen. Am Ende der Formular muss man das Paswort bestätigen.
//Sobald das Anmelden-Button geklickt wird, wird eine Validationseite (register.php) geöffnet und die Eingaben werden validiert.
//Falls die Eingabe ist, wird der Browser auf diese Seite zurückgeleitet und Fehlermeldungen werden angezeigt.

session_start();
require_once '../security.php';
require_once '../classes/UserLogic.php';

//eine Funktion, um es zu prüft, ob man eingeloggt ist. Wenn ja, gibt sie true zurück. Sonst falsch.
$result = UserLogic::checkLogin();
if ($result) {
  header('Location: dashboard.php');
  return;
}

//für Fehlermeldungen
$err = $_SESSION['err'] ?? [];
unset($_SESSION['err']);

$title = 'Sign Up';
include "../includes/header.php";
?>

<div class="container main-wrap">
  <h3 class="text-center page-title">Registrieren</h3>

  <form method="POST" action="register.php" class="login-card mx-auto">
    <div class="card card-accent shadow rounded-4 p-4 mb-4">
      <div class="mb-3">
        <label for="username" class="form-label">Benutzername</label>
        <input class="form-control" type="text" name="username" placeholder="z.B. cook_abc" id="username-register">
        <!-- Fehlermeldung, wenn username leer ist -->
        <?php if (isset($err['username'])) : ?>
          <p class="text-danger"><?php echo $err['username']; ?></p>
        <?php endif; ?>
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">E-mail</label>
        <input class="form-control" type="email" name="email" placeholder="z.B. abcdef@xxx.com" id="email">
        <!-- Fehlermeldung, wenn email leer ist -->
        <?php if (isset($err['email'])) : ?>
          <p class="text-danger"><?php echo $err['email']; ?></p>
        <?php endif; ?>
      </div>

      <div class="mb-3">
        <label for="password" class="form-label">Passwort</label>
        <input class="form-control" type="password" name="password" placeholder="mehr als 8 Zeichen" id="password-register">
        <!-- Fehlermeldung, wenn password leer ist -->
        <?php if (isset($err['password'])) : ?>
          <p class="text-danger"><?php echo $err['password']; ?></p>
        <?php endif; ?>
      </div>
      <div class="mb-4">
        <label for="password_conf" class="form-label">Passwort bestätigen</label>
        <input class="form-control" type="password" name="password_conf" placeholder="mehr als 8 Zeichen" id="password-register">
        <!-- Fehlermeldung, wenn password-bestätigen falsch ist -->
        <?php if (isset($err['password_conf'])) : ?>
          <p class="text-danger"><?php echo $err['password_conf']; ?></p>
        <?php endif; ?>
      </div>

      <!-- CSRF-Schutz -->
      <input type="hidden" name="csrf_token" value="<?php echo h(setToken()); ?>">

      <div class="d-grid gap-2">
        <input type="submit" value="Anmelden">
      </div>

    </div>
  </form>
  <div class="text-center link"><a class="text-primary" href="login_form.php">Login</a>
  </div>
</div>

<?php include "../includes/footer.php" ?>