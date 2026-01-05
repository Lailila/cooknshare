<?php 
$requiredRole = "admin";
require __DIR__ . "/../includes/secure.php";
require_once __DIR__ . "/../DB/DBconnect.php";

//Eingabe filtern, ungültige IDs ergeben falsch
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
if(!empty($imagePath)){
  $serverPath = $_SERVER['DOCUMENT_ROOT'] . "/cooknshare/uploads/profile/" . $imagePath;
  var_dump($_SERVER['DOCUMENT_ROOT']);
var_dump($imagePath);
var_dump($serverPath);
exit;
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