<?php 
session_start();

//Seiten sind abgesichert vor URL Zugriffen
$_SESSION['role'] = 'user';
if(!isset($_SESSION['user'])) {
  header("Location: ../pages/login.php");
  exit;
}

//Admin-Rolle muss gegeben sein
if (isset($requiredRole)) {
  if (!isset($_SESSION['role']) || $_SESSION['role'] !== $requiredRole) {
    header("Location: ../pages/login.php");
    exit;
  }
}