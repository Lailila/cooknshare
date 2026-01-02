<?php
session_start();
require_once '../classes/UserLogic.php';

//CheckLogin ist eine Klasse, um es zu prüft, ob man eingeloggt ist. Wenn ja, gibt sie true zurück. Sonst falsch.
$result = UserLogic::checkLogin();

//wenn man schon eingeloggt ist, wird der Browser auf dashboard.php weitergeleitet.
if($result) {
  header('Location: ../pages/dashboard.php');
  return;
}

//wenn man nicht eingeloggt ist, wird die Session zerstört.
$err = $_SESSION;
$_SESSION = array();
session_destroy();

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <title>Login</title>
  <link rel="stylesheet" href="../style/index.css">
</head>
<body>

<?php include "../includes/header.php" ?>


    <main class="container py-5">
          <h3 class="mb-3 text-center">Login</h3>

          <form action="login.php" method="POST" class="login-card mx-auto">

          <div class="card card-accent shadow rounded-4 p-4 mb-4">

            <div class="mb-3">
              <label for="username" class="form-label">Benutzername</label>
            <input class="form-control" type="text" name="username" placeholder="Benutzername" id="username-register" >
            <?php if (isset($err['username'])) : ?>
              <p class="text-danger"><?php echo $err['username']; ?></p>
            <?php endif; ?>
            </div>
            
            <div class="mb-4">
              <label for="password" class="form-label">Passwort</label>
            <input class="form-control" type="password" name="password" placeholder="Passwort" id="password-register"  >
            <?php if(isset($err['password'])) : ?>
              <p class="text-danger"><?php echo $err['password']; ?></p>
            <?php endif; ?>
            </div>

            <?php if (isset($err['msg'])) : ?>
            <p class="text-danger"><?php echo $err['msg']; ?></p>
          <?php endif; ?>

            

            <div class="d-grid gap-2">
              <input type="submit" value="Login">
            </div>
          </div>
        </form>

        <div class="text-center link"><a class="text-primary" href="signup_form.php">Registrieren</a></div>
    </main>

  <?php include "../includes/footer.html" ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>