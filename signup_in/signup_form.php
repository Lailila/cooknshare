<?php
session_start();

require_once '../security.php';
require_once '../classes/UserLogic.php';

//CheckLogin ist eine Klasse, um es zu prüft, ob man eingeloggt ist. Wenn ja, gibt sie true zurück. Sonst falsch.
$result = UserLogic::checkLogin();
if($result) {
  header('Location: dashboard.php');
  return;
}

$err = $_SESSION['err'] ?? [];
unset($_SESSION['err']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <title>Sign Up</title>
  <link rel="stylesheet" href="../style/index.css">
</head>
<body>
<?php include "../includes/header.php" ?>

<main class="container py-5">
          <h3 class="mb-3 text-center">Registrieren</h3>
        

          <form method="POST" action="register.php" class="login-card mx-auto">
          <div class="card card-accent shadow rounded-4 p-4 mb-4">
            <div class="mb-3">
              <label for="username" class="form-label">Benutzername</label>
            <input class="form-control" type="text" name="username" placeholder="z.B. cook_abc" id="username-register">
            <?php if (isset($err['username'])) : ?>
              <p class="text-danger"><?php echo $err['username']; ?></p>
            <?php endif; ?>
            </div>

            <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input class="form-control" type="email" name="email" placeholder="z.B. abcdef@xxx.com" id="email">
            <?php if (isset($err['email'])) : ?>
              <p class="text-danger"><?php echo $err['email']; ?></p>
            <?php endif; ?>
            </div>
            
            <div class="mb-3">
              <label for="password" class="form-label">Passwort</label>
            <input class="form-control" type="password" name="password" placeholder="mehr als 8 Zeichen" id="password-register" >
            <?php if (isset($err['password'])) : ?>
              <p class="text-danger"><?php echo $err['password']; ?></p>
            <?php endif; ?>
            </div>
            <div class="mb-4">
              <label for="password_conf" class="form-label">Passwort nochmal</label>
            <input class="form-control" type="password" name="password_conf" placeholder="mehr als 8 Zeichen" id="password-register">
            <?php if (isset($err['password_conf'])) : ?>
              <p class="text-danger"><?php echo $err['password_conf']; ?></p>
            <?php endif; ?>
            </div>

            <input type="hidden" name="csrf_token" value="<?php echo h(setToken()); ?>">

            <div class="d-grid gap-2">
              <input type="submit" value="Anmelden">
            </div>

          </div>
        </form>
        <div class="text-center link"><a class="text-primary" href="login_form.php">Login</a>
      </div>
    </main>

    <?php include "../includes/footer.html" ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>