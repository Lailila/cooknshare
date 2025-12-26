<?php 
session_start();

$_SESSION['user'] = 'test';
//$_SESSION['role'] = 'user';
$_SESSION['role'] = 'admin';

header("Location: index.php");
exit;