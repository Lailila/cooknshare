<?php
//Der Browser wird auf diese Seite weitergeleitet, wenn man auf der bearbeiten-Seite das aktualisieren-Button klickt, und es wird geprüft, ob nichts vom Upload-Formular leer ist. Falls was leer ist, wird der Browser auf die bearbeiten-Seite zurückgeleitet.
//Ansonsten werden die eingegebene Daten gespeichert.
//Sobald der Datei-aktualisieren erfolgreich abgeschlossen ist, wird der browser auf eigene Rezeptlist-Seite weitergeleitet.
session_start();
require_once '../classes/UserLogic.php';
require_once '../classes/db_access.php';
require_once "../DB/DBconnect.php";
require_once "../security.php";

//prüft, ob man eingeloggt ist. Wenn ja, gibt sie true zurück. Sonst falsch.
if (!UserLogic::checkLogin()) {
  header('Location: ../signup_in/login_form.php');
  return;
}

//die per POST gesendete recipe_id in einen int-Wert konvertieren
$recipe_id = (int)$_POST['recipe_id'];

$user_id   = $_SESSION['login_user']['id'];

$title     = $_POST['title'];
$category  = $_POST['category'];
$ingredients = trim($_POST['ingredients']);
$description = trim($_POST['description']);

$err_msgs = [];
$file = $_FILES['img'] ?? null;

$filesize = $file['size'];
$file_err = $file['error'];
$filename = basename($file['name']);
$upload_dir = __DIR__ . '/../uploads/recipes/';
$save_filename = date('YmdHis') . $filename;
$save_path = $upload_dir . '/' . $save_filename;
$view_path = '/cooknshare/uploads/recipes/' . $save_filename;


// Validation für title
if (empty($title)) {
  $err_msgs['title'] = 'Bitte geben Sie ein Titel ein';
}
// prüft ob titel unter 255 Zeichen ist
if (strlen($title) > 255) {
  $err_msgs['title_size'] = 'Bitte geben Sie Titel mit maximal 255 Zeichen ein.';
}

// Validation für Kategorien
if (empty($category)) {
  $err_msgs['category'] = 'Bitte wählen Sie eine Kategorie aus';
}

// Validation für Zutaten
if (empty($ingredients)) {
  $err_msgs['ingredients'] = 'Bitte geben Sie Zutaten ein';
}

// Validation für Anleitung
if (empty($description)) {
  $err_msgs['description'] = 'Bitte geben Sie Anleitung ein';
}

// Validation für Datei
// Ist die Größe der Datei unter 1MB?
if ($filesize > 1048576 || $file_err == 2) {
  $err_msgs['filesize'] = 'Bitte wählen Sie eine Datei, der Dateigröße weniger als 1 MB ist.';
}

// erlaubte Extentionen
$allow_ext = array('jpg', 'jpeg', 'png', 'webp');
$file_ext = pathinfo($filename, PATHINFO_EXTENSION);

//prüft, ob es $allow_ext in $file_ext gibt
if (!in_array(strtolower($file_ext), $allow_ext)) {
  $err_msgs['file_type'] = 'Bitte fügen Sie eine Bilddatei bei.(.jpg, jpeg, .png oder .webp)';
}

if (count($err_msgs) > 0) {
  $_SESSION['err_msgs'] = $err_msgs;
  //die Eingabe beibehalten
  $_SESSION['old'] = [
    'title'       => $title,
    'category'    => $category,
    'ingredients' => $ingredients,
    'description' => $description,
  ];

  //wird der Browser auf edit_recipe_form.php zurückgeleitet.
  header('Location: ./edit_recipe_form.php?id=' . $recipe_id);
  exit;
}

//wenn das Upload richtig abgeschlossen wurde
if (move_uploaded_file($_FILES['img']['tmp_name'], $save_path)) {
  //eine Funktion abrufen
  db_access::updateRecipe(
    $recipe_id,
    $user_id,
    $title,
    $category,
    $ingredients,
    $description,
    $view_path
  );
}

header('Location: MyRecipe.php');
exit;
