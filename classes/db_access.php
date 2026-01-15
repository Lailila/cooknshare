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
   * Rezeptdaten anhand der Benutzer-ID des angemeldeten Benutzers abrufen
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




  public static function getLatestRecipeImagePathByUserId($user_id)
  {
    $sql = '
    SELECT image_path
    FROM recipes
    WHERE user_id = ?
    ORDER BY created_at DESC
    LIMIT 1
  ';

    try {
      $stmt = connect()->prepare($sql);
      $stmt->execute([$user_id]);
      return $stmt->fetchColumn();
    } catch (\Exception $e) {
      return false;
    }
  }



  /**
   * Favoriten anhand der Benutzer-ID des angemeldeten Benutzers abrufen
   * @param string $user_id
   * @return array|bool $recipe|false
   */
  public static function getFavsByUserId($user_id)
  {
    $sql = "
    SELECT r.*
    FROM favorites f
    JOIN recipes r ON f.recipe_id = r.id
    WHERE f.user_id = ?
  ";

    try {
      $stmt = connect()->prepare($sql);
      $stmt->execute([$user_id]);
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (\Exception $e) {
      return false;
    }
  }

  public static function getLatestFavImagePathByUserId($user_id)
  {
    $sql = '
    SELECT r.image_path
    FROM favorites f
    JOIN recipes r ON f.recipe_id = r.id
    where f.user_id = ?
    ORDER BY f.created_at DESC
    LIMIT 1
  ';


    try {
      $stmt = connect()->prepare($sql);
      $stmt->execute([$user_id]);
      return $stmt->fetchColumn(); 
    } catch (\Exception $e) {
      return false;
    }
  }



  /**
   * 
   * 
   */
  public static function updateRecipe(
    int $recipe_id,
    int $user_id,
    string $title,
    string $category,
    string $ingredients,
    string $description,
    ?string $image_path = null
  ) {
    $pdo = connect();

    if ($image_path !== null) {
      $sql = "
            UPDATE recipes
            SET
                title = :title,
                category = :category,
                ingredients = :ingredients,
                description = :description,
                image_path = :image_path
            WHERE id = :id
              AND user_id = :user_id
        ";
    } else {
      $sql = "
            UPDATE recipes
            SET
                title = :title,
                category = :category,
                ingredients = :ingredients,
                description = :description
            WHERE id = :id
              AND user_id = :user_id
        ";
    }

    $stmt = $pdo->prepare($sql);

    $stmt->bindValue(':title', $title, PDO::PARAM_STR);
    $stmt->bindValue(':category', $category, PDO::PARAM_STR);
    $stmt->bindValue(':ingredients', $ingredients, PDO::PARAM_STR);
    $stmt->bindValue(':description', $description, PDO::PARAM_STR);
    $stmt->bindValue(':id', $recipe_id, PDO::PARAM_INT);
    $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);

    if ($image_path !== null) {
      $stmt->bindValue(':image_path', $image_path, PDO::PARAM_STR);
    }

    return $stmt->execute();
  }


  /**
   * eine Rezept löschen
   */
}
