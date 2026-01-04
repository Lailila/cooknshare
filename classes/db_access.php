<?php

require_once '../DB/DBconnect.php';

class db_access
{
  /**
   * fileDaten speichern
   * @param string $filename
   * @param string $save_path
   * @param string $title
   * @param string $category
   * @param string $ingredients
   * @param string $description
   */
  public static function fileSave($user_id, $filename, $save_path, $title, $category, $ingredients, $description)
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
  public static function getAllFile()
  {
    $sql = "SELECT * FROM recipes";

    $fileData = connect()->query($sql);

    return $fileData;
  }


  /**
   * Überprüfen, ob die user_id des aktuell eingelogten Kontos in der Datenbank vorhanden ist.
   * @param string $user_id
   * @return array|bool $recipe|false
   */
  public static function getRecipeByUserId($user_id)
  {
    $sql = 'SELECT * FROM recipes WHERE $user_id = ?';

    $arr = [];
    $arr[] = $user_id;

    try {
      $stmt = connect()->prepare($sql);
      $stmt->execute($arr);
      $recipe = $stmt->fetch();
      return $recipe;
    } catch(\Exception $e) {
      return false;
    }
  }
}
