<?php 
session_start();

$error = "";

//require __DIR__ ."/../includes/db.php"; //DB-Verbindung

//TO DO: LOGIN

//TO DO: REGISTER

require __DIR__ . "/../includes/header.php"; 
?>

<div class="container py-5">
<!--Login-Bereich-->
<h3 class="h3 text-center mb-3">Login</h3>

<?php if ($error): ?>
  <div class="alert alert-danger text-center"><?= htmlspecialchars($error) ?></div>
<?php endif; ?>

<form action="login.php" method="POST" class="mx-auto login-card">
  <div class="card shadow rounded-4 p-4 mb-4 card-accent">

    <input type="text"
           name="username-login"
           class="form-control mb-3"
           placeholder="Username"
           required>

    <input type="password"
           name="password-login"
           class="form-control mb-3"
           placeholder="Passwort"
           required>

    <button type="submit" class="btn btn-primary w-100" name="login">
      Einloggen
    </button>
  </div>
</form>

<!--Registrier-Bereich-->
<h3 class="mb-3 text-center">Registrieren</h3>
  <form action="login.php" method="POST" class="login-card mx-auto">
    <div class="card card-accent shadow rounded-4 p-4 mb-4">
    <input class="form-control mb-3"
           type="email"
           name="email"
           placeholder="E-Mail"
           required>

    <input class="form-control mb-3"
           type="text"
           name="username-register"
           placeholder="Username"
           required>

    <input class="form-control mb-3"
           type="password"
           name="password-register"
           placeholder="Passwort"
           required>

    <button type="submit" class="btn btn-primary w-100" name="register">
      Registrieren
    </button>
  </div>
</form>
</div>      

<?php require __DIR__ . "/../includes/footer.php"; ?>