<?php
//Diese Datei enthält die Rezepteliste-Seite, dort werden die Rezepte angezeigt, die der Benutzer hochgeladen hat. Die Detail-Seite wird geöffnet, wenn man ein Rezept klickt. 
//Man kann auch Rezept bearbeiten oder löschen. Wenn das bearbeiten-Button geklickt wird, wird bearbeiten-Seite geöffnet.(edit_recipe_form.php)
session_start();
require_once '../classes/UserLogic.php';
require_once '../classes/db_access.php';
require_once '../security.php';
require_once "../DB/DBconnect.php";

$displayUsername = $_SESSION['login_user']['username'];

//prüft, ob man eingeloggt ist. Wenn ja, gibt sie true zurück. Sonst falsch.
$result = UserLogic::checkLogin();
if (!$result) {
  header('Location: ../signup_in/login_form.php');
  return;
}

$user_id = $_SESSION['login_user']['id'];

//hochgeladene Rezepte anhand der Benutzer-ID des angemeldeten Benutzers abrufen
$recipes = db_access::getRecipesByUserId($user_id);


$title = 'Meine Rezepte';
include "../includes/header.php";
include "../includes/recipe-card.php";
include "../includes/footer.php";
?>


