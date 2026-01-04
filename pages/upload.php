<?php
session_start();

$user_id = $_SESSION['login_user']['id'];
require_once "../DB/DBconnect.php";
$file = $_FILES['img'];
$filename = basename($file['name']);
$tmp_path = $file['tmp_name'];
$file_err = $file['error'];
$filesize = $file['size'];
// $upload_dir = '../images/';
$upload_dir = __DIR__ . '/../images/';
$save_filename = date('YmdHis') . $filename;
$err_msgs = array();
$save_path = $upload_dir . $save_filename;


$title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS);
$category = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_SPECIAL_CHARS);
$ingredients = filter_input(INPUT_POST, 'ingredients', FILTER_SANITIZE_SPECIAL_CHARS);
$description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS);

// Validation für title
if (empty($title)) {
  // array_push($err_msgs, 'Bitte geben Sie ein Titel ein');
  $err_msgs['title'] = 'Bitte geben Sie ein Titel ein';
}
// prüft ob titel unter 255 Zeichen ist
if (strlen($title) > 255) {
  // array_push($err_msgs, 'Bitte geben Sie Titel mit maximal 255 Zeichen ein.');
  $err_msgs['title_size'] = 'Bitte geben Sie Titel mit maximal 255 Zeichen ein.';
}

// Validation für Kategorien
if (empty($category)) {
  // array_push($err_msgs, 'Bitte wählen Sie eine Kategorie aus');
  $err_msgs['category'] = 'Bitte wählen Sie eine Kategorie aus';
}

// Validation für Zutaten
if (empty($ingredients)) {
  // array_push($err_msgs, 'Bitte geben Sie Zutaten ein');
  $err_msgs['ingredients'] = 'Bitte geben Sie Zutaten ein';
}

// Validation für Anleitung
if (empty($description)) {
  // array_push($err_msgs, 'Bitte geben Sie Anleitung ein');
  $err_msgs['description'] = 'Bitte geben Sie Anleitung ein';
}

// Validation für Datei
// Ist die Größe der Datei unter 1MB?
if ($filesize > 1048576 || $file_err == 2) {
  // array_push($err_msgs, 'Bitte wählen Sie eine Datei, der Dateigröße weniger als 1 MB ist.');
  $err_msgs['filesize'] = 'Bitte wählen Sie eine Datei, der Dateigröße weniger als 1 MB ist.';
}

// erlaubte Extentionen
$allow_ext = array('jpg', 'jpeg', 'png');
$file_ext = pathinfo($filename, PATHINFO_EXTENSION);

//prüft, ob es $allow_ext in $file_ext gibt
if (!in_array(strtolower($file_ext), $allow_ext)) {
  // array_push($err_msgs, 'Bitte fügen Sie eine Bilddatei bei.');
  $err_msgs['file_type'] = 'Bitte fügen Sie eine Bilddatei bei.(.jpg, jpeg, oder .png)';
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

  //wird der Browser auf login_form.php zurückgeleitet.
  header('Location: ./upload_form.php');
  return;
} else {
  if (is_uploaded_file($tmp_path)) {
    if (move_uploaded_file($tmp_path, $save_path)) {
      echo $filename . 'wurde auf' . $upload_dir . 'hochgeladen';
      // in DB speichern (filename, filepath, title, category, ingredients, description)
      $result = fileSave($user_id, $filename, $save_path, $title, $category, $ingredients, $description);
      if ($result) {
        echo 'in DB gespeichert';
      } else {
        echo 'in DB nicht gespeichert!';
      }
    } else {
      echo 'Die Datei konnte nicht gespeichert werden.';
    }
  } else {
    echo 'Es wurde keine Datei ausgewählt.';
    echo '<br>';
  }
}

?>
<a href="./upload_form.php">戻る</a>