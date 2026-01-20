<?php
//Diese Datei wird aufgerufen wenn der User ein Rezept löscht(auf MyRecipe.php)

require __DIR__ . "/../includes/secure.php";
require_once __DIR__ . "/../DB/DBconnect.php";

//filtert nur ungültige Werte -> falsch
$recipeId = filter_input(INPUT_POST, 'recipe_id', FILTER_VALIDATE_INT);

if(!$recipeId){
  header('Location: MyRecipe.php');
  exit;
}
//Bildpfad holen
$stmt = connect()->prepare("SELECT image_path FROM recipes WHERE id = ?");
$stmt->execute([$recipeId]);
$imagePath = $stmt->fetchColumn();
//Bild löschen
if(!empty($imagePath)){
  $serverPath = $_SERVER['DOCUMENT_ROOT'] . $imagePath;//absoluter Serverpfad, da direkter Zugriff auf Dateisystem mit unlink()
  if(file_exists($serverPath)){
    unlink($serverPath);//Löscht Bild irreversibel
  }
}

//Rezept löschen
$stmt = connect()->prepare("DELETE FROM recipes WHERE id = ?");
$stmt->execute([$recipeId]);
header('Location: MyRecipe.php');
exit;
?>