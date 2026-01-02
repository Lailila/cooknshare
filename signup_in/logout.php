<?php
session_start();
require_once '../classes/UserLogic.php';

if (!$logout = filter_input(INPUT_POST, 'logout')) {
  exit('ungültige Anfrage');
}

//prüft, ob man eingeloggt ist.
$result = UserLogic::checkLogin();

if (!$result) {
  // exit('Ihre Session ist abgelaufen. Bitte melden Sie sich erneut an.');
  header('Location: login_form.php');
}

// Logout
UserLogic::logout();

header('Location: login_form.php');
exit;

?>