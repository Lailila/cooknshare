<?php 
$requiredRole = "admin";
require __DIR__ . "/../includes/secure.php";
require_once __DIR__ . "/../DB/DBconnect.php";

//filtert nur ungültige Werte -> falsch
$commentId = filter_input(INPUT_POST, 'comment_id', FILTER_VALIDATE_INT);

if(!$commentId){
  header('Location: admin.php');
  exit;
}

$stmt = connect()->prepare("DELETE FROM comments WHERE id = ? ");
$stmt->execute([$commentId]);

header('Location: admin.php');
exit;
?>