<?php 
$requiredRole = "admin";
require __DIR__ . "/../includes/secure.php";
require_once __DIR__ . "/../DB/DBconnect.php";

if($_SERVER['REQUEST_METHOD'] !== 'POST'){
  header("Location: admin.php");
  exit;
}
//filtert nur ungültige Werte -> falsch
$recipeId = filter_input(INPUT_POST, 'recipe_id', FILTER_VALIDATE_INT);

if(!$recipeId){
  header('Location: admin.php');
  exit;
}
//Bildpfad holen
$stmt = connect()->prepare("SELECT image_path FROM recipes WHERE id = ?");
$stmt->execute([$recipeId]);
$imagePath = $stmt->fetchColumn();
//Bild löschen
if(!empty($imagePath)){
  $serverPath = $_SERVER['DOCUMENT_ROOT'] . $imagePath;

  if(file_exists($serverPath)){
    unlink($serverPath);
  }
}

//Rezept löschen
$stmt = connect()->prepare("DELETE FROM recipes WHERE id = ?");
$stmt->execute([$recipeId]);
header('Location: admin.php');
exit;
?>