<?php
session_start();
require_once '../classes/UserLogic.php';

//CheckLogin ist eine Klasse, um es zu prüft, ob man eingeloggt ist. Wenn ja, gibt sie true zurück. Sonst falsch.
$result = UserLogic::checkLogin();

//wenn man schon eingeloggt ist, wird der Browser auf dashboard.php weitergeleitet.
if($result) {
  header('Location: dashboard.php');
  return;
}


$err = [];

$token = filter_input(INPUT_POST, 'csrf_token');
if (!isset($_SESSION['csrf_token']) || $token !== $_SESSION['csrf_token']) {
  exit('ungültige Anfrage');
}

unset($_SESSION['csrf_token']);

// Validation
if(!$username = filter_input(INPUT_POST, 'username')) {
  $err['username'] = 'Bitte geben Sie einen Benutzernamen ein';
}
if(!$email = filter_input(INPUT_POST, 'email')) {
  $err['email'] = 'Bitte geben Sie eine E-Mail Adresse ein';
}
$password = filter_input(INPUT_POST, 'password');

if (!preg_match("/\A[a-z\d]{8,100}+\z/i",$password)) {
  $err['password'] = 'Passwort müssen zwischen 8 und 100 Zeichen lang sein und aus alphanumerischen Zeichen bestehen.';
}
$password_conf = filter_input(INPUT_POST, 'password_conf');
if ($password !== $password_conf) {
  $err['password_conf'] = 'Diese Passwort passt nicht';
}

if (count($err) > 0) {
  $_SESSION['err'] = $err;
  header('Location: signup_form.php');
  exit;
}


if (count($err) === 0) {
  // eine Funktion, um einen Account zu erstellen
  $hasCreated = UserLogic::createUser($_POST);

  if(!$hasCreated) {
    $err[] = 'Registrierung fehlgeschlagen';
  }
}

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

  <main>
    <div class="container text-center mt-5">
      
        <p>erfolgreich registriert!</p>
      
      <div class="text-center link"><a class="text-primary" href="login_form.php">Login</a></div>
    </div>
  </main>

  <?php include "../includes/footer.html" ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>