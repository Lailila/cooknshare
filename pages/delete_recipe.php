<?php
//Diese Datei wird aufgerufen wenn der Admin ein Rezept löscht und ist daher in admin.php das action Attribut
//davor wird noch geprüft ob es sich wirklich um einen Admin handelt, dann wird das Rezept und das zugehörige Bild gelöscht 
$requiredRole = "admin";
require __DIR__ . "/../includes/secure.php";
require_once __DIR__ . "/../DB/DBconnect.php";

if($_SERVER['REQUEST_METHOD'] !== 'POST'){
  header("Location: admin.php");
  exit;
}
//filtert, ungültige Werte -> falsch, Schutz vor SQL Injection
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
  $serverPath = $_SERVER['DOCUMENT_ROOT'] . $imagePath; //absoluter Serverpfad, da direkter Zugriff auf Dateisystem mit unlink()

  if(file_exists($serverPath)){
    unlink($serverPath);  //Löscht Bild irreversibel
  }
}

//Rezept löschen
$stmt = connect()->prepare("DELETE FROM recipes WHERE id = ?");
$stmt->execute([$recipeId]);
header('Location: admin.php');
exit;
?>