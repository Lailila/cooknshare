<?php
//Diese Datei enthält die Favoriten-Seite, dort werden die Rezepte angezeigt, die der Benutzer zu Favoriten hinzugefügt hat. Die Detail-Seite wird geöffnet, wenn man ein Rezept klickt.
session_start();
require_once '../classes/UserLogic.php';
require_once '../classes/db_access.php';
require_once '../security.php';
require_once "../DB/DBconnect.php";
$displayUsername = $_SESSION['login_user']['username'];

//prüft, ob man eingeloggt ist. Wenn ja, gibt true zurück. Sonst falsch.
$result = UserLogic::checkLogin();
if (!$result) {
  header('Location: ../signup_in/login_form.php');
  return;
}

$user_id = $_SESSION['login_user']['id'];
//Favoriten anhand der Benutzer-ID des angemeldeten Benutzers abrufen
$recipes = db_access::getFavsByUserId($user_id);

$title = 'Meine Favoriten';
include "../includes/header.php";
include "../includes/recipe-card.php";
include "../includes/footer.php";
?>


