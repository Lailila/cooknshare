<?php
//Diese Datei wird aufgerufen, wenn man Logout klickt.
//es wird geprüft, ob man eingeloggt ist.
//Nach dem erfolgreichen Logout wird der Browser auf Login_Seite weitergeleitet
session_start();
require_once '../classes/UserLogic.php';

if (!$logout = filter_input(INPUT_POST, 'logout')) {
  exit('ungültige Anfrage');
}

//prüft, ob man eingeloggt ist.
$is_login = UserLogic::checkLogin();
if (!$is_login) {
  header('Location: login_form.php');
}

// eine Funktion zum Logout
UserLogic::logout();

header('Location: login_form.php');
exit;

?>