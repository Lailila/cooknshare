<?php
//Diese Datei enthält eine Klasse namens UserLogic. In der sind Funktionen, die zum Login- und registrierungs-Funktion verwendet werden.
require_once '../DB/DBconnect.php';

class UserLogic
{
  /**
   * ein Konto erstellen
   * @param array $userData
   * @return bool $result
   */
  public static function createUser($userData)
{
  $sql = 'INSERT INTO users (username, email, password) VALUES (?, ?, ?)';

  $arr = [
    $userData['username'],
    $userData['email'],
    password_hash($userData['password'], PASSWORD_DEFAULT)
  ];

  try {
    $stmt = connect()->prepare($sql);
    $stmt->execute($arr);
    return true;

  } catch (PDOException $e) {

    // UNIQUE constraint verletzt
    if ($e->getCode() === '23000') {

      // welcher UNIQUE index?
      if (str_contains($e->getMessage(), 'username')) {
        $_SESSION['err']['username'] = 'Dieser Benutzername ist bereits vergeben.';
      }
      if (str_contains($e->getMessage(), 'email')) {
        $_SESSION['err']['email'] = 'Diese E-Mail-Adresse ist bereits vergeben.';
      }

      return false;
    }

    // andere DB-Fehler loggen
    error_log($e->getMessage(), 3, '../error.log');
    return false;
  }
}


  /**
   * Login-Funktion
   * @param string $username
   * @param string $password
   * @return bool $result
   */
  public static function login($username, $password)
  {
    $result = false;
    // Den Benutzer durch Suche nach seinem Benutzernamen abrufen
    $user = self::getUserByUsername($username);

    if (!$user) {
      $_SESSION['msg'] = 'Dieser Benutzername ist nicht registriert';
      return $result;
    }

    //das eingegebene Passwort prüfen, ob es richtig ist
    //Wenn richtig,
    if (password_verify($password, $user['password'])) {
      session_regenerate_id(true);
      $_SESSION['login_user'] = $user;
      $result = true;
      return $result;
    }
    //Wenn falsch,
    $_SESSION['msg'] = 'Dieses Passwort ist nicht richtig';
    return $result;
  }

  /**
   * den eingegebenen Benutzernamen prüfen, ob es im DB vorhanden ist
   * @param string $username
   * @return array|bool $user|false
   */
  public static function getUserByUsername($username)
  {
    $sql = 'SELECT * FROM users WHERE username = ?';

    $arr = [];
    $arr[] = $username;

    try {
      $stmt = connect()->prepare($sql);
      $stmt->execute($arr);
      $user = $stmt->fetch();
      return $user;
    } catch(\Exception $e) {
      return false;
    }
  }

  /**
   * prüft, ob man eingeloggt ist
   * @param void
   * @return bool $result
   */
  public static function checkLogin()
  {
    $result = false;
    if (isset($_SESSION['login_user']) && $_SESSION['login_user']['id'] > 0) {
      return $result = true;
    }
    return $result;
  }

  /**
   * Logout-Funktion
   */
  public static function logout()
  {
    $_SESSION = array();
    session_destroy();
  }

}