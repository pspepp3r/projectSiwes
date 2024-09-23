<?php
session_start();

if (isset($_SESSION["user_id"])) {
  require_once '../../../../db.conn.php';

  require_once 'get.users.php';
  $user = getUser($_SESSION['user_id'], $pdo);
  $username = $user['username'];
  $user_id = $user['user_id'];

  if(isset($_GET['file'])){
    $import = $_GET['file'];
    $ifile = fopen("../../uploads/$import", "r");
    $text = fread($ifile, 999999);
    echo $text;
  }
} else {
  header('Location: ../../../../index.php');
}
