<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$requiredRole = "admin";
require __DIR__ . "/../includes/secure.php";
require_once __DIR__ . "/../DB/DBconnect.php";

//filtert nur ungültige Werte -> falsch
$userId = filter_input(INPUT_POST, 'user_id', FILTER_VALIDATE_INT);

if(!$userId){ //ungültige userId
  header('Location: admin.php');
  exit;
}

if($userId == $_SESSION['login_user']['id']){
  header('Location: admin.php');
  exit;
}
//DB connection einmal herstellen
$conn = connect();
//Profilbildpfad holen
$stmt = $conn->prepare("SELECT image_path FROM users WHERE id = ?");
$stmt->execute([$userId]);
$imagePath = $stmt->fetchColumn();
//Profilbild löschen
if(!empty($imagePath) && $imagePath !== '/cooknshare/img/profile-default.svg'){
  $serverPath = $_SERVER['DOCUMENT_ROOT'] . $imagePath;
  if(file_exists($serverPath)){
    unlink($serverPath);
  }
}
//User löschen
$stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
$stmt->execute([$userId]);
header('Location: admin.php');
exit;
?>