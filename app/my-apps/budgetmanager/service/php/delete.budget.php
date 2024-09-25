<?php
session_start();

if (isset($_SESSION["user_id"])) {
  require_once '../../../../db.conn.php';

  require_once 'get.users.php';
  $user = getUser($_SESSION['user_id'], $pdo);
  $username = $user['username'];
  $user_id = $user['user_id'];

  if (isset($_GET['file'])) {
    $file = $_GET['file'];
    unlink("../../uploads/$file");

    $query_delete_budget = "DELETE FROM budgets WHERE `bud_file` = ?";
    $do_delete_budget = $pdo->prepare($query_delete_budget);
    $do_delete_budget->execute([$file]);

    echo "Deleted";
  }
} else {
  header('Location: ../../../../index.php');
}
