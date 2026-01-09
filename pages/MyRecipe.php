<?php
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
$recipes = db_access::getRecipesByUserId($user_id);


$title = 'Meine Rezepte';
include "../includes/header.php";

include "../includes/recipe-card.php";
include "../includes/footer.php";

?>


