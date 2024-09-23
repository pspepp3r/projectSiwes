<?php
require_once '../../db.conn.php';

if (isset($_POST['pword'])) {
  session_start();
  $email= $_SESSION['email'];
  $pword = $_POST['pword'];
  $hashed = password_hash($pword, PASSWORD_DEFAULT);
  $query_update_password = "UPDATE users SET `password` = ? WHERE `email` = '$email'";
  $execute_update_password = $pdo->prepare($query_update_password);
  $execute_update_password->execute([$hashed]);

  session_unset();
  header('Location: ../../../index.php');
} else {
  header('Location: ../../../index.php');
}