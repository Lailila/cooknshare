<?php
//Diese Datei wird aufgeruft, wenn das Login-Button auf login-Seite geklickt wird.
//Hier wird es geprüft, ob die Eingabe falsch oder leer ist. Falls nicht, also beim erfolgreichen Login wird der Browser auf Dashboard weitergeleitet.
session_start();
require_once '../classes/UserLogic.php';

//CheckLogin ist eine Funktion, um es zu prüft, ob man eingeloggt ist. Wenn ja, gibt sie true zurück. Sonst falsch.
$result = UserLogic::checkLogin();
//wenn man schon eingeloggt ist, wird der Browser auf dashboard.php weitergeleitet.
if($result) {
  header('Location: ../pages/dashboard.php');
  return;
}

$err = [];
//wenn der abgeschickten Benutzernamen leer ist
if(!$username = filter_input(INPUT_POST, 'username')) {
  $err['username'] = 'Bitte geben Sie Ihren Benutzernamen ein';
}
//wenn das abgeschickte Passwort leer ist
if(!$password = filter_input(INPUT_POST, 'password')) {
  $err['password'] = 'Bitte geben Sie Ihr Passwort ein';
}
//wenn eins davon zumindest leer ist
if (count($err) > 0) {
  $_SESSION = $err;
  //wird der Browser auf login_form.php zurückgeleitet.
  header('Location: login_form.php');
  return;
}

// prüft, den abgeschickten Benutzernamen und das Passwort.
//wenn beides passt, gibt true zurück. Sonst falsch.
$result = UserLogic::login($username, $password);

// wenn nicht beides passt,
if (!$result) {
  //wird der Browser auf login_form.php zurückgeleitet.
  header('Location: login_form.php');
  return;
}

//beim erfolgreichen Login
header('Location: ../pages/dashboard.php');
exit;

?>