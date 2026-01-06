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
  public static function fileSave($user_id, $save_path, $title, $category, $ingredients, $description)
  {
    $result = False;

    $sql = "INSERT INTO recipes (user_id, image_path, title, category, ingredients, description) VALUE (?, ?, ?, ?, ?, ?)";

    try {
      $stmt = connect()->prepare($sql);
      $stmt->bindValue(1, $user_id, PDO::PARAM_INT);
      $stmt->bindValue(2, $save_path);
      $stmt->bindValue(3, $title);
      $stmt->bindValue(4, $category);
      $stmt->bindValue(5, $ingredients);
      $stmt->bindValue(6, $description);
      $result = $stmt->execute();
      return $result;
    } catch (\Exception $e) {
      echo $e->getMessage();
      return $result;
    }
  }

  /**
   * Dateidaten abrufen
   * wir könnten das vl auf mainpage.php auch verwenden????
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
  public static function getRecipesByUserId($user_id)
{
    $sql = 'SELECT * FROM recipes WHERE user_id = ? ORDER BY created_at DESC';

    try {
        $stmt = connect()->prepare($sql);
        $stmt->execute([$user_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (\Exception $e) {
        return false;
    }
}

}
