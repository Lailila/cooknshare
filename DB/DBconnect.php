<?php
require_once 'env.php';

function connect()
{

  $host = DB_HOST;
  $db = DB_NAME;
  $user = DB_USER;
  $pass = DB_PASS;

  $dsn = "mysql: host=$host; dbname=$db; charset=utf8mb4";

  try {
    $pdo = new PDO($dsn, $user, $pass, [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
    return $pdo;
  } catch (PDOException $e) {
    echo 'error!!: ' . $e->getMessage();
    exit();
  }
}

/**
 * fileDaten speichern
 * @param string $filename
 * @param string $save_path
 * @param string $title
 * @param string $category
 * @param string $ingredients
 * @param string $description
 */
function fileSave($user_id, $filename, $save_path, $title, $category, $ingredients, $description)
{
  $result = False;

  $sql = "INSERT INTO recipes (user_id, file_name, image_path, title, category, ingredients, description) VALUE (?, ?, ?, ?, ?, ?, ?)";

  try {
    $stmt = connect()->prepare($sql);
    $stmt->bindValue(1, $user_id, PDO::PARAM_INT);
    $stmt->bindValue(2, $filename);
    $stmt->bindValue(3, $save_path);
    $stmt->bindValue(4, $title);
    $stmt->bindValue(5, $category);
    $stmt->bindValue(6, $ingredients);
    $stmt->bindValue(7, $description);
    $result = $stmt->execute();
    return $result;
  } catch (\Exception $e) {
    echo $e->getMessage();
    return $result;
  }
}

/**
 * Dateidaten abrufen
 * @return array $fileData
 */
function getAllFile()
{
  $sql = "SELECT * FROM recipes";

  $fileData = connect()->query($sql);

  return $fileData;
}
