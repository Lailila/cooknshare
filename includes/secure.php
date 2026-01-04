<?php 
session_start();

//Seiten sind abgesichert vor URL Zugriffen
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

require_once "../classes/UserLogic.php";

if (!UserLogic::checkLogin()) {
  header('Location: ../signup_in/login_form.php');
  exit;
}

//Admin-Rolle muss gegeben sein
if (isset($requiredRole)) {
  if (!isset($_SESSION['role']) || $_SESSION['role'] !== $requiredRole) {
    header("Location: ../pages/login.php");
    exit;
  }
}