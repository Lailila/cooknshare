<?php 
//Diese Datei schützt den Zugriff auf unberechtigte Seiten über die URL
//falls man nicht angemeldet ist, kann nicht auf die Userseiten zugegriffen werden
//falls man keine Admin-Rolle hat, kann nicht auf die Adminseite zugegriffen werden
//Die Datei wird auf allen Seiten verwendet, die eine Anmeldung/Rolle erfordern

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

require_once "../classes/UserLogic.php";
require_once "../DB/DBconnect.php";

if (!UserLogic::checkLogin()) {
  header('Location: ../signup_in/login_form.php');
  exit;
}

//wenn auf Admin-Seite zugegriffen wird
if (isset($requiredRole)) {
  //wenn Rolle in Session vorhanden
  $role = $_SESSION['login_user']['role'] ?? null;
  //Wenn Rolle nicht in Session, aus DB holen:
  if($role === null && isset($_SESSION['login_user']['id'])){
    $stmt = connect()->prepare("SELECT role FROM users WHERE id = ?");
    $stmt->execute([(int)$_SESSION['login_user']['id']]);
    $role = $stmt->fetchColumn();

    $_SESSION['login_user']['role'] = $role;
  }
  if (!isset($_SESSION['login_user']['role']) || $_SESSION['login_user']['role'] !== $requiredRole) {
    header("Location: ../pages/mainpage.php");
    exit;
  }
}